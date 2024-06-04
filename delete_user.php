<?php
session_start();
require 'db_connect.php';

// Sadece admin kullanıcılarının erişimine izin verin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    // Kullanıcıyı veritabanından sil
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        header('Location: admin_panel.php?message=Kullanıcı başarıyla silindi.');
    } else {
        header('Location: admin_panel.php?error=Kullanıcı silinirken bir hata oluştu.');
    }

    $stmt->close();
}

$conn->close();
?>
