<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        die("User not logged in.");
    }

    $user_id = $_SESSION['user_id'];
    $game_id = $_POST['game_id'];

    // Sepetten oyunu sil
    $sql = "DELETE FROM cart WHERE user_id = ? AND game_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $game_id);

    if ($stmt->execute()) {
        echo "Game removed from cart.";
    } else {
        echo "Error removing game from cart.";
    }

    $stmt->close();
    $conn->close();
}
?>
