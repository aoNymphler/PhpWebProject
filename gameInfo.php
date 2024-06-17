<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$game_id = $_GET['game_id'];

// Oyun detaylarını veritabanından çek
$game_sql = "
    SELECT games.id, games.title, games.description, games.price, games.image_url, games.video, categories.name AS category
    FROM games
    JOIN categories ON games.category_id = categories.id
    WHERE games.id = ?
";
$stmt = $conn->prepare($game_sql);
$stmt->bind_param("i", $game_id);
$stmt->execute();
$game_result = $stmt->get_result();
$game = $game_result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($game['title']); ?></title>
    <style>
        body {
            font-family: Consolas, monospace;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-image: url("assets/gameınfopıcture/arkaplan.jpg");
            background-size: cover;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 150px;
            text-align: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
        }
        .game-media {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .game-media iframe,
        .game-media img {
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .game-media .large {
            width: 60%;
            height: 315px;
        }
        .game-media .small {
            width: 30%;
        }
        .game-description {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #f00;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #d00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($game['title']); ?></h1>
        <div class="game-media">
            <iframe
                class="large"
                src="<?php echo htmlspecialchars($game['video']); ?>"
                frameborder="0"
                allowfullscreen
            ></iframe>
            <img
                src="<?php echo htmlspecialchars($game['image_url']); ?>"
                alt="Small Game Image"
                class="small"
            />
        </div>
        <div class="game-description">
            <p><?php echo nl2br(htmlspecialchars($game['description'])); ?></p>
        </div>
        <button onclick="addToCart(<?php echo $game['id']; ?>)" class="btn">Sepete Ekle - <?php echo htmlspecialchars($game['price']); ?> TL</button>
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
