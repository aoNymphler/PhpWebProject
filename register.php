<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if (empty($username) || empty($password) || empty($password_confirm) || empty($firstname) || empty($lastname)) {
        $error_message = "Tüm alanları doldurun.";
    } elseif ($password !== $password_confirm) {
        $error_message = "Şifreler eşleşmiyor.";
    } else {
        // Kullanıcı adının mevcut olup olmadığını kontrol et
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "Bu kullanıcı adı zaten mevcut.";
        } else {
            // Şifreyi hashle
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Yeni kullanıcıyı ekle
            $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname, role) VALUES (?, ?, ?, ?, 'user')");
            $stmt->bind_param("ssss", $username, $hashed_password, $firstname, $lastname);

            if ($stmt->execute()) {
                header('Location: signin.php');
                exit();
            } else {
                $error_message = "Kayıt sırasında bir hata oluştu.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('assets\\hero-1.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Arkaplanı %80 şeffaf beyaz yapar */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 300px;
            margin: 0 auto; /* Form container'ı sayfanın ortasına hizala */
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
            background-color:  red;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label>Password Again</label>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Enter your password" required>
                </div>
                <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
                <div class="form-group">
                    <input type="submit" value="Register">
                </div>
                <div class="form-group">
                    <p>Have an account? <a href="signin.php">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

</html>