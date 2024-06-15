<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$game_id = $_POST['game_id'];

$sql = "SELECT * FROM games WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $game_id);
$stmt->execute();
$result = $stmt->get_result();
$game = $result->fetch_assoc();

// Assume game files are stored in a directory called 'game_files' with filenames corresponding to their IDs
$filepath = 'game_files/' . $game_id . '.zip';

if (file_exists($filepath)) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    exit;
} else {
    echo "File not found.";
}
?>
