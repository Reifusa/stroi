<?php
session_start();
require "connect.php";

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Ошибка: некорректный метод запроса.");
}

// Получаем данные из формы
$order_id = intval($_POST['order_id']);
$action = $_POST['action'];

// Проверяем, что переданы все данные
if (empty($order_id) || empty($action)) {
    die("Ошибка: отсутствуют обязательные параметры.");
}

// Определяем новый статус в зависимости от действия
if ($action === "close") {
    $new_status = "Закрыт";
} elseif ($action === "cancel") {
    $new_status = "Отменён";
} else {
    die("Ошибка: недопустимое действие.");
}

// Обновляем статус заказа в базе данных
$query = "UPDATE orders SET status = ? WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("si", $new_status, $order_id);
if ($stmt->execute()) {
    // Перенаправляем пользователя обратно на страницу деталей заказа
    header("Location: ekka-html/order_details.php?order_id=$order_id");
    exit();
} else {
    die("Ошибка: не удалось обновить статус заказа.");
}
?>
