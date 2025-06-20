<?php
require_once 'config.php';
session_start();

// Проверка авторизации
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

// Получаем список бронирований
$stmt = $pdo->query("SELECT b.*, s.title as service_title 
                    FROM bookings b 
                    LEFT JOIN services s ON b.service_id = s.id 
                    ORDER BY b.booking_date DESC, b.booking_time DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions { white-space: nowrap; }
    </style>
</head>
<body>
    <h1>Бронирования</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Услуга</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= htmlspecialchars($booking['id']) ?></td>
                <td><?= htmlspecialchars($booking['service_title']) ?></td>
                <td><?= htmlspecialchars($booking['client_name']) ?></td>
                <td><?= htmlspecialchars($booking['client_phone']) ?></td>
                <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                <td><?= htmlspecialchars($booking['booking_time']) ?></td>
                <td class="actions">
                    <a href="view_booking.php?id=<?= $booking['id'] ?>">Просмотр</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="logout.php">Выйти</a></p>
</body>
</html>