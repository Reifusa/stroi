<?php
// Подключаем файл с базой данных
require 'connect.php';

// Проверяем, авторизован ли пользователь
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получаем данные из формы
$user_id = intval($_POST['user_id']);
$prod_id = intval($_POST['prod_id']);
$quantity = intval($_POST['quantity']);

// Проверяем корректность данных
if ($user_id <= 0 || $prod_id <= 0 || $quantity <= 0) {
    echo "Ошибка: неверные данные.";
    exit();
}

// Проверяем, есть ли товар с таким ID в корзине у данного пользователя
$check_query = $db->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND prod_id = ?");
$check_query->bind_param("ii", $user_id, $prod_id);
$check_query->execute();
$result = $check_query->get_result();

if ($result->num_rows > 0) {
    // Если товар уже есть в корзине, обновляем количество
    $cart_item = $result->fetch_assoc();
    $new_quantity = $cart_item['quantity'] + $quantity;

    $update_query = $db->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
    $update_query->bind_param("ii", $new_quantity, $cart_item['id']);
    $update_query->execute();
} else {
    // Если товара нет в корзине, добавляем новую запись
    $insert_query = $db->prepare("INSERT INTO cart (user_id, prod_id, quantity) VALUES (?, ?, ?)");
    $insert_query->bind_param("iii", $user_id, $prod_id, $quantity);
    $insert_query->execute();
}

// Перенаправляем пользователя на страницу корзины
header("Location: ekka-html/product-full-width.php?id=$prod_id");
exit();
