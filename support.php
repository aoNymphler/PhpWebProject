<?php
session_start();
require 'db_connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Tüm alanlar doldurulmalıdır.');</script>";
    } else {
        $sql = "INSERT INTO support (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Hazırlama başarısız: ' . htmlspecialchars($conn->error));
        }

        $bind = $stmt->bind_param("sss", $name, $email, $message);
        if ($bind === false) {
            die('Bağlama başarısız: ' . htmlspecialchars($stmt->error));
        }

        $exec = $stmt->execute();
        if ($exec) {
            echo "<script>alert('Mesajınız gönderildi. En kısa sürede size geri döneceğiz.');</script>";
        } else {
            echo "<script>alert('Mesajınız gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin.');</script>";
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Consolas, monospace;
            margin: 0;
            padding: 0;
            background: url('assets\\hero-1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            width: 800px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
        }
        header {
            background-color: transparent;
            color: white;
            padding: 5px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        header h1 {
            margin: 0;
            font-size: 20px;
        }
        .content {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .contact-info {
            flex: 1;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-right: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .contact-info h2 {
            font-size: 18px;
            margin-top: 0;
        }
        .contact-info p {
            line-height: 1.4;
            font-size: 14px;
        }
        .contact-info i {
            margin-right: 5px;
        }
        .support-form {
            flex: 2;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .support-form h2 {
            font-size: 18px;
            margin-top: 10px;
        }
        .support-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .support-form input,
        .support-form textarea {
            width: calc(100% - 20px);
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .support-form textarea {
            height: 100px;
            resize: none;
        }
        .support-form button {
            background-color: black;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .support-form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="support-form">
                <h2>Size nasıl yardımcı olabiliriz?</h2>
                <p>Sorularınız veya yardıma ihtiyacınız varsa, lütfen aşağıdaki formu doldurun ve destek ekibimiz en kısa sürede size geri dönecektir.</p>
                <form action="support.php" method="post">
                    <label for="name">Ad:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">E-posta:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Mesaj:</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                    <button type="submit">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
