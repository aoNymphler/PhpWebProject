<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];


$sql = "SELECT game_id FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$purchase_successful = false;

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $game_id = $row['game_id'];

        $purchase_sql = "INSERT INTO purchases (user_id, game_id, purchase_date) VALUES (?, ?, NOW())";
        $purchase_stmt = $conn->prepare($purchase_sql);
        $purchase_stmt->bind_param("ii", $user_id, $game_id);

        if ($purchase_stmt->execute()) {
            $delete_sql = "DELETE FROM cart WHERE user_id = ? AND game_id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("ii", $user_id, $game_id);
            $delete_stmt->execute();
            $purchase_successful = true;
        } else {
            echo "An error occurred. Please try again.";
        }

        $purchase_stmt->close();
    }

    if ($purchase_successful) {
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<meta http-equiv="refresh" content="4;url=index.php">';
        echo '<title>Purchase Successful</title>';
        echo '<style>';
        echo 'body { display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<img src="assets/payment-done.png" alt="Payment Successful">';
        echo '<p>Redirecting to the homepage...</p>';
        echo '</body>';
        echo '</html>';
    } else {
        echo "An error occurred during the purchase process.";
    }
} else {
    echo "There are no items in your cart.";
}

$stmt->close();
$conn->close();
?>
