<?php
session_start();
require "../connect.php"; // Подключаем соединение с базой данных

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: /ekka-html/login.php");
    exit;
}

// Получаем id пользователя из сессии
$user_id = $_SESSION['user_id'];

// Получаем данные из формы
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Проверяем, является ли пользователь администратором
$query = "SELECT role FROM users WHERE id = ?";
$stmt = $db->prepare($query);

if ($stmt === false) {
    die('Ошибка подготовки запроса: ' . $db->error); // Печатаем ошибку, если запрос не подготовился
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Если роль не admin, перенаправляем
if (!$user || $user['role'] !== 'admin') {
    header("Location: /ekka-html/index.php");
    exit;
}

// Обновляем информацию в базе данных
$update_query = "UPDATE users SET name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?";
$stmt_update = $db->prepare($update_query);

if ($stmt_update === false) {
    die('Ошибка подготовки запроса на обновление: ' . $db->error); // Печатаем ошибку, если запрос на обновление не подготовился
}

$stmt_update->bind_param("ssssi", $name, $last_name, $email, $phone, $user_id);
$stmt_update->execute();

// Закрываем запросы
$stmt->close();
$stmt_update->close();

// Перенаправляем пользователя на страницу профиля
header("Location: user-profile.php");
exit;
?>
