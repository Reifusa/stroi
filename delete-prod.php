<?php
// Подключение к базе данных
require "connect.php";

// Проверяем, есть ли ID товара в запросе
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Получаем данные о товаре, чтобы удалить изображение
    $query = "SELECT image FROM products WHERE id = $product_id";
    $result = $db->query($query);

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $image_path = "../img/" . $product['image'];

        // Удаляем изображение, если оно существует
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Удаляем товар из базы данных
        $delete_query = "DELETE FROM products WHERE id = $product_id";
        if ($db->query($delete_query)) {
            header("Location: ekka-admin/product-list.php?message=deleted");
            exit;
        } else {
            die("Ошибка при удалении товара: " . $db->error);
        }
    } else {
        die("Товар с указанным ID не найден.");
    }
} else {
    die("ID товара не указан.");
}
?>
