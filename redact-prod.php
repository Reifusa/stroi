<?php
// Подключение к базе данных
require "connect.php";

// Проверяем, была ли форма отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['id']);
    $name = $_POST['name'];
    $categ_id = intval($_POST['categ_id']);
    $desc = $_POST['desc'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $sup_id = intval($_POST['sup_id']);
    $image = $_FILES['image']['name'];

    // Если загружено новое изображение
    if (!empty($image)) {
        $image_path = "img/" . basename($image); // Убрали "../" для корректного пути
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $update_query = "UPDATE products 
                             SET name = '$name', 
                                 categ_id = $categ_id, 
                                 `desc` = '$desc', 
                                 price = $price, 
                                 quantity = $quantity, 
                                 sup_id = $sup_id, 
                                 `image` = '$image' 
                             WHERE id = $product_id";
        } else {
            die('Ошибка загрузки файла: ' . error_get_last()['message']);
        }
    } else {
        $update_query = "UPDATE products 
                         SET name = '$name', 
                             categ_id = $categ_id, 
                             `desc` = '$desc', 
                             price = $price, 
                             quantity = $quantity, 
                             sup_id = $sup_id
                         WHERE id = $product_id";
    }

    // Выполняем запрос
    if ($db->query($update_query)) {
        header('Location: ekka-admin/product-list.php');
        exit;
    } else {
        die('Ошибка при обновлении данных: ' . $db->error);
    }
} else {
    die('Неправильный метод отправки данных.');
}
