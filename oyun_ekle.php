<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

// Kullanıcıları veritabanından çek
$sql = "SELECT id, username, firstname, lastname, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
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
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <h1>Admin Paneli</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kullanıcı Adı</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Rol</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td>
                                    <?php if ($row['role'] !== 'admin'): ?>
                                        <form method="POST" action="delete_user.php">
                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="delete-button">Sil</button>
                                        </form>
                                    <?php else: ?>
                                        <button class="delete-button" disabled>Sil</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Hiç kullanıcı bulunamadı.</td>
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
