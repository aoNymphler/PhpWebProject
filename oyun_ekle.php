<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

// Kategorileri veritabanından çek
$category_sql = "SELECT id, name FROM categories";
$category_result = $conn->query($category_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyun Ekle</title>
    <link rel="stylesheet" href="./css/admin_panel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="./assets/logo.png" alt="Logo" style="width:215px; margin-top:20px">
        </div>
        <div class="profile">
            <h2><?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></h2>
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
            <h1>Oyun Ekle</h1>
        </header>
        <main>
            <!-- Oyun Ekleme Formu -->
            <section>
                <form action="add_game.php" method="POST" enctype="multipart/form-data">
                    <label for="title">Oyun Başlığı:</label>
                    <input type="text" id="title" name="title" required><br><br>

                    <label for="description">Açıklama:</label>
                    <textarea id="description" name="description" required></textarea><br><br>
                    
                    <label for="video">Video URL:</label>
                    <textarea id="video" name="video" required></textarea><br><br>
                    
                    <label for="image">Resim:</label>
                    <input type="file" id="image" name="image" accept="image/*" required><br><br>
                    
                    <label for="price">Fiyat:</label>
                    <input type="number" id="price" name="price" step="0.01" required><br><br>
                    
                    <label for="category">Kategori:</label>
                    <select id="category" name="category_id" required>
                        <?php while($row = $category_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                        <?php endwhile; ?>
                    </select><br><br>
                    
                    <button type="submit">Oyun Ekle</button>
                </form>
            </section>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
