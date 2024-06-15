<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Kullanıcının oyunlarını veritabanından çek
$user_games_sql = "SELECT games.title, games.image_url, purchases.purchase_date FROM games JOIN purchases ON games.id = purchases.game_id WHERE purchases.user_id = ?";
$stmt = $conn->prepare($user_games_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_games_result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="./css/index3.css">
</head>
<body>
    <div class="container">
        <h1>Your Library</h1>
        <div class="games">
            <?php while($game = $user_games_result->fetch_assoc()): ?>
                <div class="game">
                    <img src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <h2><?php echo htmlspecialchars($game['title']); ?></h2>
                    <p>Purchased on: <?php echo htmlspecialchars($game['purchase_date']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
