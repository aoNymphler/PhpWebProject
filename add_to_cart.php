<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$game_id = $_POST['game_id'];

// Kullanıcının bu oyunu kütüphanesinde olup olmadığını kontrol et
$check_library_sql = "SELECT * FROM purchases WHERE user_id = ? AND game_id = ?";
$check_library_stmt = $conn->prepare($check_library_sql);
$check_library_stmt->bind_param("ii", $user_id, $game_id);
$check_library_stmt->execute();
$check_library_stmt->store_result();

if ($check_library_stmt->num_rows > 0) {
    echo "This game is already in your library.";
} else {
    // Kullanıcının bu oyunu zaten sepete ekleyip eklemediğini kontrol et
    $check_cart_sql = "SELECT * FROM cart WHERE user_id = ? AND game_id = ?";
    $check_cart_stmt = $conn->prepare($check_cart_sql);
    $check_cart_stmt->bind_param("ii", $user_id, $game_id);
    $check_cart_stmt->execute();
    $check_cart_stmt->store_result();

    if ($check_cart_stmt->num_rows > 0) {
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

    $check_cart_stmt->close();
}

$check_library_stmt->close();
$conn->close();
?>
