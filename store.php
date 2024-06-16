<?php
session_start();
require 'db_connect.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store</title>
    <!-- Include your CSS and other head elements -->
</head>
<body>
    <h1>Store</h1>
    <?php while($category = $result->fetch_assoc()): ?>
        <h2><?php echo htmlspecialchars($category['name']); ?></h2>
        <?php
        $category_id = $category['id'];
        $game_sql = "SELECT * FROM games WHERE category_id = $category_id";
        $game_result = $conn->query($game_sql);
        ?>
        <?php while($game = $game_result->fetch_assoc()): ?>
            <div>
                <h3><?php echo htmlspecialchars($game['title']); ?></h3>
                <p><?php echo htmlspecialchars($game['description']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($game['price']); ?></p>
                <form method="POST" action="purchase.php">
                    <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                    <button type="submit">Buy</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php endwhile; ?>
</body>
</html>
