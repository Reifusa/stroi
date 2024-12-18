<?php
// Запускаем сессию и подключаем базу данных
session_start();
require 'connect.php';

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Ошибка: доступ запрещён. Авторизуйтесь, чтобы продолжить.';
    header('Location: ekka-html/cart.php');
    exit();
}

// Проверяем, передан ли ID товара для удаления
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Ошибка: некорректный запрос. ID товара отсутствует.';
    header('Location: ekka-html/cart.php');
    exit();
}

// Получаем ID товара и идентификатор пользователя
$prod_id = intval($_GET['id']);
$user_id = intval($_SESSION['user_id']);

// Удаляем товар из корзины
$query = "DELETE FROM cart WHERE user_id = ? AND prod_id = ?";
$stmt = $db->prepare($query);

if (!$stmt) {
    $_SESSION['error'] = 'Ошибка подготовки запроса: ' . $db->error;
    header('Location: ekka-html/cart.php');
    exit();
}

$stmt->bind_param("ii", $user_id, $prod_id);
$stmt->execute();

// Проверяем успешность выполнения
// Перенаправляем обратно на страницу корзины
header('Location: ekka-html/cart.php');
exit();
