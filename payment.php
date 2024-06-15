<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Kullanıcının sepetindeki oyunları alın
$sql = "SELECT game_id FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Oyunları satın alma işlemi
    while ($row = $result->fetch_assoc()) {
        $game_id = $row['game_id'];

        // Oyunu kullanıcıya ekle
        $purchase_sql = "INSERT INTO purchases (user_id, game_id, purchase_date) VALUES (?, ?, NOW())";
        $purchase_stmt = $conn->prepare($purchase_sql);
        $purchase_stmt->bind_param("ii", $user_id, $game_id);

        if ($purchase_stmt->execute()) {
            // Sepetten oyunu sil
            $delete_sql = "DELETE FROM cart WHERE user_id = ? AND game_id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("ii", $user_id, $game_id);
            $delete_stmt->execute();
        } else {
            echo "Bir hata oluştu. Lütfen tekrar deneyin.";
        }

        $purchase_stmt->close();
    }
    echo "Satın alma işlemi başarıyla gerçekleştirildi.";
} else {
    echo "Sepetinizde ürün bulunmamaktadır.";
}

$stmt->close();
$conn->close();
?>
