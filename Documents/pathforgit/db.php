<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$database = "testdb"; //повинна бути створена в субд

// Встановлення з'єднання
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
