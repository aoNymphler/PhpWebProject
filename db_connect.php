<?php
$servername = "localhost";
$username = "root"; // Veritaban� kullan�c� ad�
$password = ""; // Veritaban� �ifresi
$dbname = "mydatabase"; // Veritaban� ad�

// Veritaban� ba�lant�s�n� olu�turma
$conn = new mysqli($servername, $username, $password, $dbname);

// Ba�lant�y� kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
