<?php
$servername = "localhost";
$username = "root"; // Veritabaný kullanýcý adý
$password = ""; // Veritabaný þifresi
$dbname = "mydatabase"; // Veritabaný adý

// Veritabaný baðlantýsýný oluþturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Baðlantýyý kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
