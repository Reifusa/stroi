<?php
session_start();
require "connect.php";

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Пользователь не авторизован
    header("Location: ekka-html/index.php");
    exit;
}

// Получаем id пользователя из сессии
$user_id = $_SESSION['user_id'];

// Запрашиваем роль пользователя из базы данных
$query = "SELECT role FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $role = $user['role'];

    if ($role === 'user') {
        // Если роль "user", перенаправляем в ekka-html
        header("Location: ekka-html/index.php");
    } elseif ($role === 'admin') {
        // Если роль "admin", перенаправляем в ekka-admin
        header("Location: ekka-admin/user-profile.php");
    } else {
        // Неизвестная роль (дополнительная защита)
        header("Location: ekka-html/index.php");
    }
    exit;
} else {
    // Пользователь не найден в базе данных (дополнительная защита)
    header("Location: ekka-html/index.php");
    exit;
}
?>
