<?php
// Подключаем базу данных
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $user_id = intval($_POST['user_id']);
    $products = $_POST['products'];
    $order_date = date('Y-m-d H:i:s'); // Текущая дата и время
    $amount = 0; // Итоговая сумма заказа

    // Подготовка массива для вставки в таблицу order_items
    $order_items_data = [];

    // Начинаем транзакцию
    $db->begin_transaction();

    try {
        foreach ($products as $prod) {
            $prod_id = intval($prod['id']);
            $quantity = intval($prod['quantity']);
            $unit_price = floatval($prod['price']);

            // Проверка доступного количества товара
            $query = "SELECT quantity FROM products WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $prod_id);
            $stmt->execute();
            $stmt->bind_result($available_quantity);
            $stmt->fetch();
            $stmt->close();

            if ($quantity > $available_quantity) {
                throw new Exception("Недостаточное количество товара для продукта ID: $prod_id. Доступно: $available_quantity.");
            }

            // Уменьшаем количество товара в таблице products
            $query = "UPDATE products SET quantity = quantity - ? WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ii", $quantity, $prod_id);
            $stmt->execute();

            // Рассчитать общую стоимость заказа
            $amount += $quantity * $unit_price;

            // Добавить данные о товаре для вставки в таблицу order_items
            $order_items_data[] = [
                'prod_id' => $prod_id,
                'quantity' => $quantity,
                'unit_price' => $unit_price,
            ];
        }

        // Вставка в таблицу orders
        $query = "INSERT INTO `orders` (user_id, order_date, amount, status) VALUES (?, ?, ?, 'Активен')";
        $stmt = $db->prepare($query);
        $stmt->bind_param("isd", $user_id, $order_date, $amount);
        $stmt->execute();
        $order_id = $db->insert_id; // Получить ID добавленного заказа

        // Вставка в таблицу order_items
        $query = "INSERT INTO order_items (order_id, prod_id, quanty, unit_price) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);

        foreach ($order_items_data as $item) {
            $stmt->bind_param("iiid", $order_id, $item['prod_id'], $item['quantity'], $item['unit_price']);
            $stmt->execute();
        }

        // Подтверждаем транзакцию
        $db->commit();

        // Перенаправление на страницу успешного оформления заказа
        header("Location: ekka-html/orders.php");
        exit();
    } catch (Exception $e) {
        // Откат транзакции при ошибке
        $db->rollback();
        die("Ошибка: " . $e->getMessage());
    }
} else {
    die("Некорректный метод запроса.");
}
