<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Kullanıcının oyunlarını veritabanından çek
$user_games_sql = "SELECT games.title, games.image_url, purchases.purchase_date FROM games JOIN purchases ON games.id = purchases.game_id WHERE purchases.user_id = ?";
$stmt = $conn->prepare($user_games_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_games_result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow-y: auto;
        }

        .container {
            position: relative;
            min-height: 100%;
            background-color: rgb(0, 0, 0);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("assets/hero-1.jpg") no-repeat center center fixed;
            background-size: cover;
            filter: blur(8px);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .content {
            position: relative;
            z-index: 1;
            width: 80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .games {
            display: flex;
            flex-wrap: wrap;
        }

        .game {
            margin: 10px;
            text-align: center;
            margin-inline: 20px;
            margin-top: 30px;
        }

        .image {
            width: 200px;
            height: 200px;
        }

        .fontTitleArea {
            text-align: center;
            font-size: 50px;
        }

        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: rgba(50, 0, 0, 1);
            color: white;
            padding: 10px 50px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            z-index: 2;
            font-size: 25px;
        }

        .back-button:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .font {
            font-size: 15px;
            background-color: rgba(50, 0, 0, 1);
            padding: 10px 25px;
            color: white;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <a href="index.php" class="back-button">Back</a>
    <div class="container">
        <div class="background"></div>
        <div class="overlay"></div>
        <div class="content">
            <h1 class="fontTitleArea">Your Library</h1>
            <div class="games">
                <?php while ($game = $user_games_result->fetch_assoc()) : ?>
                    <div class="game">
                        <img class="image" src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>">
                        <h2 class="fontTitle"><?php echo htmlspecialchars($game['title']); ?></h2>
                        <button class="font">DOWLOAD</button>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
$stmt->close();
$conn->close();
?>