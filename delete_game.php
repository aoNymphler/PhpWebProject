<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $game_id = $_POST['game_id'];

    // Önce oyunun resim yolunu al
    $sql = "SELECT image_url FROM games WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $game_id);
    $stmt->execute();
    $stmt->bind_result($image_url);
    $stmt->fetch();
    $stmt->close();

    // Resim dosyasını sil
    if (file_exists($image_url)) {
        unlink($image_url);
    }

    // Oyunu veritabanından sil
    $sql = "DELETE FROM games WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $game_id);

    if ($stmt->execute()) {
        echo "The game has been deleted.";
    } else {
        echo "Sorry, there was an error deleting the game.";
    }

    $stmt->close();
}

$conn->close();
?>
