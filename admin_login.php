<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Простая проверка (в реальном проекте используйте хеширование!)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Неверные учетные данные';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в админ-панель</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; }
        .error { color: red; margin-bottom: 15px; }
        input { display: block; width: 100%; padding: 8px; margin-bottom: 15px; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Вход в админ-панель</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
</body>
</html>