<?php
require_once 'config.php';

// Включим подробное логирование
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Логируем полученные данные
error_log("Получены данные: " . print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Получаем и валидируем данные
        $service_id = filter_input(INPUT_POST, 'service_id', FILTER_VALIDATE_INT);
        $client_name = trim(filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING));
        $client_email = filter_input(INPUT_POST, 'client_email', FILTER_VALIDATE_EMAIL);
        $client_phone = trim(filter_input(INPUT_POST, 'client_phone', FILTER_SANITIZE_STRING));
        $booking_date = filter_input(INPUT_POST, 'booking_date', FILTER_SANITIZE_STRING);
        $booking_time = filter_input(INPUT_POST, 'booking_time', FILTER_SANITIZE_STRING);
        $comments = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING));

        // Проверка обязательных полей
        $errors = [];
        if (!$service_id) $errors[] = "Не выбрана услуга";
        if (empty($client_name)) $errors[] = "Укажите ваше имя";
        if (!$client_email) $errors[] = "Укажите корректный email";
        if (empty($client_phone)) $errors[] = "Укажите ваш телефон";
        if (empty($booking_date)) $errors[] = "Выберите дату";
        if (empty($booking_time)) $errors[] = "Выберите время";

        if (!empty($errors)) {
            throw new Exception(implode("<br>", $errors));
        }

        // Проверяем доступность времени
        $stmt = $pdo->prepare("SELECT id FROM bookings WHERE booking_date = ? AND booking_time = ?");
        $stmt->execute([$booking_date, $booking_time]);
        
        if ($stmt->rowCount() > 0) {
            throw new Exception("Выбранное время уже занято. Пожалуйста, выберите другое время.");
        }

        // Сохраняем бронирование
        $stmt = $pdo->prepare("INSERT INTO bookings 
                              (service_id, client_name, client_email, client_phone, booking_date, booking_time, comments) 
                              VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $success = $stmt->execute([
            $service_id,
            $client_name,
            $client_email,
            $client_phone,
            $booking_date,
            $booking_time,
            $comments
        ]);

        if (!$success) {
            throw new Exception("Ошибка при сохранении данных в базу.");
        }

        // Логируем успешное сохранение
        error_log("Бронирование успешно сохранено: " . print_r($_POST, true));
        
        // Перенаправляем на страницу успеха
        header("Location: booking_success.php");
        exit;

    } catch (Exception $e) {
        // Логируем ошибку
        error_log("Ошибка бронирования: " . $e->getMessage());
        
        // Сохраняем ошибки и данные формы в сессии
        session_start();
        $_SESSION['booking_errors'] = $e->getMessage();
        $_SESSION['form_data'] = $_POST;
        header("Location: {$_SERVER['HTTP_REFERER']}#services");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>