<?php
session_start();
require 'db_connect.php';

// Sadece admin kullanıcılarının erişimine izin verin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

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
    <link rel="stylesheet" href="./css/admin_panel.css"> <!-- Stil dosyanızı ekleyin -->
</head>
<body>
    <h1>Admin Paneli</h1>
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
                            <form method="POST" action="delete_user.php">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Sil</button>
                            </form>
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
</body>
</html>

<?php
$conn->close();
?>
