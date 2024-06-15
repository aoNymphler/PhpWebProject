<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "
    SELECT games.id, games.title, games.price, games.image_url, cart.added_date
    FROM cart
    JOIN games ON cart.game_id = games.id
    WHERE cart.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Consolas, monospace;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-image: url('assets\\hero-1.jpg');
            background-size: cover;
            color: #fff;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('assets/hero-1.jpg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.9;
            filter: blur(10px);
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 150px;
            text-align: center;
            display: grid;
            gap: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .product img {
            width: 200px;
            height: auto;
            border-radius: 5px;
            margin-right: 20px;
        }

        .product-details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .delete-product {
            color: #ff5555;
            cursor: pointer;
            margin-left: 10px;
        }

        .delete-product:hover {
            color: #ff0000;
        }

        .total-price {
            font-size: 1.3rem;
            margin-top: 20px;
            color: #fff;
        }

        .purchase-options {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .purchase-options img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin: 0 10px;
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
    </style>
</head>
<body>
<a href="index.php" class="back-button">Back</a>
<div class="container">
    <h1>YOUR SHOP</h1>
    <?php if (count($cart_items) > 0): ?>
        <?php foreach ($cart_items as $item): ?>
            <div class="product">
                <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                <div class="product-details">
                    <div class="product-name"><?php echo htmlspecialchars($item['title']); ?></div>
                    <div class="product-price"><?php echo htmlspecialchars($item['price']); ?>$ <i class="fas fa-times delete-product" onclick="deleteProduct(<?php echo $item['id']; ?>)"></i></div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="total-price" id="totalPrice">
            <?php
            $total = 0;
            foreach ($cart_items as $item) {
                $total += $item['price'];
            }
            echo "Toplam: $" . number_format($total, 2);
            ?>
        </div>
    <?php else: ?>
        <p>Cart is empty.</p>
    <?php endif; ?>
</div>

<div class="purchase-options">
    <a href="payment.php"><img src="assets/icon/credikart.png" alt="Credit Card"></a>
    <a href="payment.php"><img src="assets/icon/debit.jpeg" alt="Debit Card"></a>
    <a href="payment.php"><img src="assets/icon/paypal.png" alt="PayPal"></a>
    <a href="payment.php"><img src="assets/icon/applepay.jpg" alt="Apple Pay"></a>
</div>

<script>
    function deleteProduct(gameId) {
        // AJAX isteği göndererek oyunu sepetten çıkar
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "remove_from_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                location.reload(); // Sayfayı yenile
            }
        };
        xhr.send("game_id=" + gameId);
    }
</script>

</body>
</html>
