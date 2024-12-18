<?php
session_start();
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Проверяем, что поля не пустые
    if (!empty($email) && !empty($password)) {
        // Ищем пользователя по email
        $query = "SELECT id, pass FROM users WHERE email = ?";
        $stmt = $db->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            // Проверяем, найден ли пользователь
            if ($stmt->num_rows === 1) {
                $stmt->bind_result($id, $hashed_pass);
                $stmt->fetch();

                // Проверяем пароль
                if (password_verify($password, $hashed_pass)) {
                    // Сохраняем id пользователя в сессии
                    $_SESSION['user_id'] = $id;

                    // Перенаправляем пользователя
                    header("Location: distrib.php");
                    exit;
                } else {
                    echo "<p>Неверный пароль. Попробуйте снова.</p>";
                }
            } else {
                echo "<p>Пользователь с таким email не найден.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Ошибка выполнения запроса: " . htmlspecialchars($db->error) . "</p>";
        }
    } else {
        echo "<p>Пожалуйста, заполните все поля.</p>";
    }
} else {
    echo "<p>Неверный метод отправки данных.</p>";
}
?>
