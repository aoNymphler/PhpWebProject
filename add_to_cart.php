<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$game_id = $_POST['game_id'];

// Kullanıcının bu oyunu zaten sepete ekleyip eklemediğini kontrol et
$check_sql = "SELECT * FROM cart WHERE user_id = ? AND game_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ii", $user_id, $game_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "This game is already in your cart.";
} else {
    // Sepete oyunu ekleme
    $sql = "INSERT INTO cart (user_id, game_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $game_id);

    if ($stmt->execute()) {
        echo "Game added to cart.";
    } else {
        echo "Error adding game to cart.";
    }

    $stmt->close();
}

$check_stmt->close();
$conn->close();
?>
