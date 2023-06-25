<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $walls = $_POST['wallCost'];
    $ceiling = $_POST['ceilingCost'];
    $wallsSelected = $_POST['selectedWall'];
    $ceilingSelected = $_POST['selectedCeiling'];
    $totalCost = $_POST['total'];

    // Формирование письма
    $to = $email;
    $subject = 'Заказ лифта';
    $message = "Имя: $name\n";
    $message .= "Email: $email\n";
    $message .= "Стоимость стен: $walls\n";
    $message .= "Выбранные стены: $wallsSelected\n";
    $message .= "Стоимость потолка: $ceiling\n";
    $message .= "выбранный потолок: $ceilingSelected\n";
    $message .= "Общая стоимость: $totalCost\n";
    $headers = "From: arsen.berdnikov@mail.ru" . "\r\n";

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Письмо успешно отправлено.";
    } else {
        echo "Ошибка при отправке письма.";
    }
}
var_dump($totalCost);