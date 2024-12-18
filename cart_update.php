<?php
// Запускаем сессию и подключаем базу данных
session_start();
require 'connect.php';

// Проверяем, что пользователь авторизован и данные переданы
if (!isset($_SESSION['user_id']) || !isset($_POST['quantity'])) {
    $_SESSION['error'] = 'Ошибка: данные не переданы.';
    header('Location: ekka-html/cart.php');
    exit();
}

// Получаем идентификатор пользователя
$user_id = intval($_SESSION['user_id']);

// Обрабатываем массив количества товаров
foreach ($_POST['quantity'] as $prod_id => $quantity) {
    $prod_id = intval($prod_id); // Преобразуем ID товара в число
    $quantity = intval($quantity); // Преобразуем количество в число

    // Убедимся, что количество положительное
    if ($quantity < 1) {
        $_SESSION['error'] = 'Ошибка: некорректное количество товара.';
        continue;
    }

    // Проверяем доступное количество товара и получаем его название
    $query = "SELECT name, quantity FROM products WHERE id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        $_SESSION['error'] = 'Ошибка подготовки запроса: ' . $db->error;
        header('Location: ekka-html/cart.php');
        exit();
    }

    $stmt->bind_param("i", $prod_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Если товар не найден или доступное количество меньше введенного
    if (!$row) {
        $_SESSION['error'] = "Ошибка: товар с ID $prod_id не найден.";
        continue;
    }

    $product_name = $row['name']; // Название товара
    if ($quantity > $row['quantity']) {
        $_SESSION['error'] = "Ошибка: количество товара \"$product_name\" превышает доступное.";
        continue;
    }

    // Формируем запрос на обновление количества в корзине
    $query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND prod_id = ?";
    $stmt = $db->prepare($query);

    if (!$stmt) {
        $_SESSION['error'] = 'Ошибка подготовки запроса: ' . $db->error;
        continue;
    }

    $stmt->bind_param("iii", $quantity, $user_id, $prod_id);
    $stmt->execute();
}

// Завершаем выполнение скрипта
header('Location: ekka-html/cart.php');
exit();
