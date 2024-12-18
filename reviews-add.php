<?php
session_start();
require "connect.php";  // Подключение к базе данных

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    die('Вы должны быть авторизованы для добавления отзыва.');
}

// Проверяем, что данные отправлены методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $comment_text = $_POST['your-commemt'];
    $product_id = intval($_POST['id_prod']);
    $user_id = intval($_POST['id_user']);

    // Проверка на пустой комментарий
    if (empty($comment_text)) {
        die('Комментарий не может быть пустым.');
    }

    // Подготовленный запрос для добавления отзыва в базу
    $stmt = $db->prepare("INSERT INTO reviews (text, id_prod, id_user) VALUES (?, ?, ?)");
    $stmt->bind_param('sii', $comment_text, $product_id, $user_id);

    if ($stmt->execute()) {
        // Перенаправление на страницу товара с сообщением об успешном добавлении отзыва
        header("Location: ekka-html/product-full-width.php?id=$product_id&message=review_added");
        exit;
    } else {
        // Если ошибка при добавлении отзыва
        die("Ошибка при добавлении отзыва: " . $db->error);
    }
} else {
    die('Неправильный метод отправки данных.');
}
