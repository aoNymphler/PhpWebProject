<?php
session_start();
require 'db_connect.php';

// Sadece admin kullanıcılarının erişimine izin verin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Gelen user_id'yi al
$user_id = $_POST['user_id'];

// Silinecek kullanıcının rolünü kontrol et
$sql = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['role'] !== 'admin') {
    // Kullanıcı admin değilse sil
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

$stmt->close();
$conn->close();

header('Location: admin_panel.php');
exit();
?>