<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Бронирование успешно</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        .success-message { background: #d4edda; color: #155724; padding: 20px; border-radius: 5px; max-width: 600px; margin: 0 auto; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="success-message">
        <h2>Спасибо за вашу заявку!</h2>
        <p>Мы получили ваше бронирование и свяжемся с вами для подтверждения.</p>
        <a href="index.php" class="btn">Вернуться на главную</a>
    </div>
</body>
</html>