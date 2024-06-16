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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $video = $_POST['video'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;

            $sql = "INSERT INTO games (title, video, description, price, image_url, category_id ) VALUES ( ?,?, ?, ?, ? ,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssdsi", $title, $video, $description, $price, $image_url, $category_id);
            $stmt->execute();
            $stmt->close();

            header('Location: manage_games.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
