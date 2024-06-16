<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$game_id = $_POST['game_id'];

// Kullanıcının bu oyunu zaten satın alıp almadığını kontrol et
$check_purchase_sql = "SELECT * FROM purchases WHERE user_id = ? AND game_id = ?";
$stmt = $conn->prepare($check_purchase_sql);
$stmt->bind_param("ii", $user_id, $game_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Bu oyunu zaten satın aldınız.";
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();

// Satın alma işlemini gerçekleştir
$purchase_sql = "INSERT INTO purchases (user_id, game_id) VALUES (?, ?)";
$stmt = $conn->prepare($purchase_sql);
$stmt->bind_param("ii", $user_id, $game_id);

if ($stmt->execute()) {
    echo "Oyun başarıyla satın alındı.";
} else {
    echo "Satın alma işlemi sırasında bir hata oluştu.";
}

$stmt->close();
$conn->close();
?>
