<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı bilgilerini kontrol et
    $stmt = $conn->prepare("SELECT id, password, firstname, lastname, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password, $firstname, $lastname, $role);
        $stmt->fetch();

        if (password_verify($password, $stored_password)) {
            $_SESSION['user_id'] = $id; // Kullanıcı kimliğini oturuma kaydet
            $_SESSION['user'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['role'] = $role; 
            header('Location: index.php');
            exit();
        } else {
            $error_message = "Geçersiz kullanıcı adı veya şifre.";
        }
    } else {
        $error_message = "Geçersiz kullanıcı adı veya şifre.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Consolas, monospace;
            margin: 0;
            padding: 0;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translateX(-50%) translateY(-50%);
            background: no-repeat;
            background-size: cover;
            transition: 1s opacity;
        }

        .container {
            width: 800px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
        }
        
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 300px;
            margin: 0 auto; /* Form container'ı sayfanın ortasına hizala */
            color: #fff;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left; /* Etiketleri sola hizala */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: black;
            color: #fff;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: red;
        }

        
        .form-group p {
            color: #fff; /* White text color */
        }

        .form-group p a {
            color: red; /* White text color for link */
            text-decoration: none;
        }

        .form-group p a:hover {
            text-decoration: underline;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 150px; /* Adjust the width as needed */
            height: auto;
        }
    </style>
</head>

<body>
    <video autoplay muted loop>
        <source src="assets/videos/Y2meta.app-VJ LOOP--DRAGONZONE-(1080p).mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container">
        <div class="form-container">
            <div class="logo-container">
                <img src="assets/logo.png" alt="Logo">
            </div>
            <h2>Sign In</h2>
            <form action="signin.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
                <div class="form-group">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
