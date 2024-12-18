<?php
session_start(); // Стартуем сессию

// Уничтожаем все данные сессии
session_unset(); // Удаляем переменные сессии
session_destroy(); // Уничтожаем сессию

// Перенаправляем пользователя на главную страницу
header("Location: /ekka-html/index.php");
exit();
?>