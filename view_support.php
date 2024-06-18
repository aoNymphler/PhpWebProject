<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: signin.php');
    exit();
}

$support_sql = "SELECT * FROM support ORDER BY submitted_at DESC";
$support_result = $conn->query($support_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Support Messages</title>
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
                <li><a href="view_support.php"><i class="fas fa-envelope" style="margin-right:10px"></i> Support Messages</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <h1>Destek Mesajları</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>E-posta</th>
                        <th>Mesaj</th>
                        <th>Gönderim Tarihi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($support_result->num_rows > 0): ?>
                        <?php while($row = $support_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Hiç destek mesajı bulunamadı.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>

<?php
$support_result->close();
$conn->close();
?>