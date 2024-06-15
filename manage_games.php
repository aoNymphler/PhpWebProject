<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Oyun ve kategorilerini çek
$games_sql = "
    SELECT games.id, games.title, games.description, games.image_url, categories.name AS category
    FROM games
    LEFT JOIN categories ON games.category_id = categories.id
";
$games_result = $conn->query($games_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyunları Yönet</title>
    <link rel="stylesheet" href="./css/admin_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="./assets/logo.png" alt="Logo" style="width:215px; margin-top:20px">
        </div>
        <div class="profile">
            <h2><?php echo htmlspecialchars($_SESSION['firstname'] . ' ' . $_SESSION['lastname']); ?></h2>
            <p>Admin</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home" style="margin-right:10px"></i> Ana Sayfa</a></li>
                <li><a href="admin_panel.php"><i class="fas fa-tachometer-alt" style="margin-right:10px"></i> Admin Panel</a></li>
                <li><a href="oyun_ekle.php"><i class="fas fa-gamepad" style="margin-right:10px"></i> Oyun Ekle</a></li>
                <li><a href="manage_games.php"><i class="fas fa-list" style="margin-right:10px"></i> Oyunları Yönet</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <h1>Oyunları Yönet</h1>
        </header>
        <main>
            <h2>Mevcut Oyunlar</h2>
            <table>
                <thead>
                    <tr>
                        <th>Oyun Adı</th>
                        <th>Açıklama</th>
                        <th>Görsel</th>
                        <th>Kategori</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($games_result->num_rows > 0): ?>
                        <?php while($game = $games_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($game['title']); ?></td>
                                <td><?php echo htmlspecialchars($game['description']); ?></td>
                                <td><img src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" width="50"></td>
                                <td><?php echo htmlspecialchars($game['category']); ?></td>
                                <td>
                                    <form method="POST" action="delete_game.php">
                                        <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                                        <button type="submit" class="delete-button">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Hiç oyun bulunamadı.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
