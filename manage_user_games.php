<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$user_id = $_GET['user_id'];

// Kullanıcının oyunlarını veritabanından çek
$user_games_sql = "SELECT games.id, games.title FROM games JOIN purchases ON games.id = purchases.game_id WHERE purchases.user_id = ?";
$stmt = $conn->prepare($user_games_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_games_result = $stmt->get_result();

// Tüm oyunları veritabanından çek (kullanıcıya eklemek için)
$all_games_sql = "SELECT id, title FROM games";
$all_games_result = $conn->query($all_games_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Oyunlarını Yönet</title>
    <link rel="stylesheet" href="./css/admin_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="./assets/logo.png" alt="Logo" style="width:215px; margin-top:20px">
        </div>
        <div class="profile">
            <h2>Admin</h2>
            <p>Kullanıcı Oyunları Yönetimi</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home" style="margin-right:10px"></i> Ana Sayfa</a></li>
                <li><a href="admin_panel.php"><i class="fas fa-tachometer-alt" style="margin-right:10px"></i> Admin Panel</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <h1>Kullanıcı Oyunlarını Yönet</h1>
        </header>
        <main>
            <h2>Kullanıcıdaki Oyunlar</h2>
            <ul>
                <?php while($game = $user_games_result->fetch_assoc()): ?>
                    <li>
                        <?php echo htmlspecialchars($game['title']); ?>
                        <form method="POST" action="remove_user_game.php" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                            <button type="submit" class="delete-button">Sil</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>

            <h2>Kullanıcıya Oyun Ekle</h2>
            <form method="POST" action="add_user_game.php">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <select name="game_id" required>
                    <?php while($game = $all_games_result->fetch_assoc()): ?>
                        <option value="<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit" class="add-button">Ekle</button>
            </form>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
