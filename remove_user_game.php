<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$user_id = $_POST['user_id'];
$game_id = $_POST['game_id'];

// Kullanıcıdan oyun sil
$sql = "DELETE FROM purchases WHERE user_id = ? AND game_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $game_id);

if ($stmt->execute()) {
    header('Location: manage_user_games.php?user_id=' . $user_id);
} else {
    echo "Hata: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
