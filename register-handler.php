<?php
require "connect.php";

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $phonenumber = trim($_POST['phonenumber']);
    $address = trim($_POST['address']);
    $pass = trim($_POST['pass']);
    $pass_confirm = trim($_POST['pass_confirm']);
    $role = 'user'; // Автоматически задаём роль "user"

    // Проверяем, что все обязательные поля заполнены
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phonenumber) && !empty($pass) && !empty($pass_confirm)) {
        // Проверяем совпадение паролей
        if ($pass !== $pass_confirm) {
            echo "<p>Пароли не совпадают. Пожалуйста, проверьте ввод.</p>";
            exit;
        }

        // Хешируем пароль перед добавлением в базу
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Подготавливаем SQL-запрос
        $query = "INSERT INTO users (name, last_name, email, phone, address, role, pass) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);

        if ($stmt) {
            // Привязываем параметры
            $stmt->bind_param("sssssss", $firstname, $lastname, $email, $phonenumber, $address, $role, $hashed_pass);
            if ($stmt->execute()) {
                // Успешная регистрация
                echo "<p>Регистрация успешна!</p>";
                header("Location: ekka-html/login.php"); // Перенаправляем на страницу авторизации
                exit;
            } else {
                // Ошибка выполнения
                echo "<p>Ошибка при добавлении пользователя: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            // Ошибка подготовки запроса
            echo "<p>Ошибка подготовки запроса: " . htmlspecialchars($db->error) . "</p>";
        }
    } else {
        echo "<p>Пожалуйста, заполните все обязательные поля.</p>";
    }
} else {
    echo "<p>Неверный метод отправки данных.</p>";
}
?>
