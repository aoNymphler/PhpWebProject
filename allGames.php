<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

date_default_timezone_set('Europe/Istanbul');
$current_date = date('M d, Y');
$current_time = date('H:i');

$user_id = $_SESSION['user_id'];

// Kullanıcının sahip olduğu oyunları al
$purchased_games_sql = "SELECT game_id FROM purchases WHERE user_id = ?";
$stmt = $conn->prepare($purchased_games_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$purchased_games = [];
while ($row = $result->fetch_assoc()) {
    $purchased_games[] = $row['game_id'];
}
$stmt->close();

// Tüm oyunları ve kategorileri veritabanından çek
$games_sql = "
    SELECT games.id, games.title, games.price, games.image_url, categories.name AS category
    FROM games
    JOIN categories ON games.category_id = categories.id
";
$games_result = $conn->query($games_sql);

$games = [];
while ($row = $games_result->fetch_assoc()) {
    $games[$row['category']][] = $row;
}

$games_result->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Halic University</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/gameCss.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel&family=Montserrat:wght@200&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="area">
            <div class="topBar">
                <div class="topBarLeftArea">
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="admin_panel.php" class="fontTopBar">Admin Paneli</a> 
                    <span>/</span>
                    <?php endif; ?>
                    <i class="fa-regular fa-clock"></i>
                    <p class="fontTopBar">
                        <?php echo $current_date; ?>
                    </p>
                    <span>/</span>
                    <i class="fa-solid fa-gear"></i>
                    <p class="fontTopBar">
                        <?php echo htmlspecialchars($_SESSION['firstname'] . ' ' . $_SESSION['lastname']); ?>
                    </p>
                    <span>/</span>
                    <i class="fa-solid fa-right-to-bracket"></i >
                    <p class="fontTopBar"><a href="signin.php">Sign Out</a></p>
                </div>
                <div class="images">
                    <i class="fa-solid fa-basket-shopping fa-xl"></i>
                    <a class="shop-txt fontTopBar" href="shop.php">SHOP</a> 
                </div>
            </div>
            <div class="logo">
                <img src="assets/logo.png" class="logosize" alt="Örnek Resim" />
            </div>
            <div class="divArea">
                <?php foreach ($games as $category => $category_games): ?>
                    <h1 id="<?php echo strtolower($category); ?>"><?php echo strtoupper($category); ?></h1>
                    <div class="imagesdivpositionmainbox99">
                        <?php foreach ($category_games as $game): ?>
                            <div class="game" style="display: inline-block; margin: 20px;">
                                <a href="gameInfo.php?game_id=<?php echo $game['id']; ?>">
                                    <img src="<?php echo htmlspecialchars($game['image_url']); ?>" class="imagebox2" alt="<?php echo htmlspecialchars($game['title']); ?>">
                                </a>
                                <div>
                                    <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                    <span class="font9Price"><?php echo htmlspecialchars($game['price']); ?>$</span>
                                    <span class="font9">/</span>
                                    <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                    <span class="font9">250</span>
                                    <?php if (in_array($game['id'], $purchased_games)): ?>
                                        <button class="add-to-cart" disabled>Owned</button>
                                    <?php else: ?>
                                        <button onclick="addToCart(<?php echo $game['id']; ?>)" class="add-to-cart">Add to Cart</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
        function addToCart(gameId) {
            // AJAX isteği göndererek oyunu sepete ekliyoruz
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert(xhr.responseText); // Sunucudan gelen yanıtı göster
                }
            };
            xhr.send("game_id=" + gameId);
        }
    </script>
</body>
</html>
