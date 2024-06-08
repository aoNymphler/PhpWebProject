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
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <p>Haliç Üniversitesi Öğrencileri</p>
        
        <h2>Our Team</h2>
        <p>Haliç Üniversitesi öğrencileri olarak Internet & Web Programming dersi ödevini yapmak amacımız.</p>
        
        <h2>Our Mission</h2>
        <p>Şirket Adı, [şirketinizin veya projenizin genel hedefleri ve vizyonu hakkında bilgi.]</p>
        
      
    </div>
</body>
</html>

