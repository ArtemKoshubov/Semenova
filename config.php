<?php
$host = 'localhost';
$dbname = 'photostudio';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Для отладки:
    error_log("Успешное подключение к базе данных");
} catch (PDOException $e) {
    error_log("Ошибка подключения: " . $e->getMessage());
    die("Ошибка подключения к базе данных. Пожалуйста, попробуйте позже.");
}
?>