<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
            opacity: 0.9; /* Adjust the opacity as needed */
            filter: blur(10px); /* Adjust the blur as needed */
            z-index: -1;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 1px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top:50px;
            text-align: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <p>Haliç Üniversitesi Öğrencileri</p>
        
        <h2>Our Team</h2>
        <p>As students of Haliç University, our goal is to complete the assignment for the Internet & Web Programming course.</p>
        
        <h2>Our Mission</h2>
        <p>- By offering our users the most entertaining and educational games, we aim to ensure they have a fun time while also gaining new skills.</p>
        <p>-To create a community that brings together game enthusiasts, providing opportunities for knowledge sharing and interaction.</p>
        <p>-By offering our users the latest and highest quality games, we aim to continuously enhance their gaming experience.</p>
        <p>-To provide our users with a safe, fair, and enjoyable gaming environment.</p>
        <p>-By keeping up with the latest innovations in the gaming world and offering them to our users, we aim to be a constantly evolving and growing platform.</p>
        <p>-To offer an easily accessible and user-friendly platform that appeals to players of all ages and skill levels.</p>
        <p>-To provide support and guidance to users on all matters related to games.</p>
        
      
    </div>
</body>
</html>

