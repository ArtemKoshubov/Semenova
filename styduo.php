<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "photo_studio_vdohnovenie";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение услуг из базы данных
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="service-grid">';
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        echo '<div class="service-item">
                <img src="'.$row["image_path"].'" alt="'.$row["title"].'" class="service-image">
                <h3>'.$row["title"].'</h3>
                <p>'.$row["description"].'</p>
                <p class="service-price">Цена: '.$row["price"].'</p>
                <a href="#" class="btn-book" 
                   data-title="'.$row["title"].'" 
                   data-description="'.$row["description"].'" 
                   data-price="'.$row["price"].'">Забронировать</a>
              </div>';
    }
    echo '</div>';
} else {
    echo "0 результатов";
}
$conn->close();
?>