<?php
require 'connect.php'; // Подключаем базу данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $categ_id = $_POST['categ_id'];
    $sup_id = $_POST['sup_id'];

    // Обработка изображения
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];

        if (in_array($image['type'], $allowed_types)) {
            $image_name = time() . '_' . basename($image['name']);
            $image_path = 'img/' . $image_name;

            if (!file_exists('img')) {
                mkdir('img', 0777, true);
            }

            if (!move_uploaded_file($image['tmp_name'], $image_path)) {
                die("Ошибка при загрузке изображения.");
            }
        } else {
            die("Неверный тип файла.");
        }
    } else {
        $image_name = null;
    }

    // SQL-запрос
    $query = "INSERT INTO products (name, `desc`, price, quantity, categ_id, sup_id, image) 
              VALUES ('$name', '$desc', '$price', '$quantity', '$categ_id', '$sup_id', '$image_name')";

    if ($db->query($query)) {
        echo "Товар успешно добавлен!";
        header("Location: ekka-admin/product-add.php"); // Переадресация на главную страницу
    } else {
        die("Ошибка при добавлении товара: " . $db->error);
    }
}
?>