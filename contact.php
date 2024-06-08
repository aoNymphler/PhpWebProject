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
            opacity: 0.9; /* Adjust the opacity as needed */
            filter: blur(10px); /* Adjust the blur as needed */
            z-index: -1;
        }


        .header-container {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
        }

        header {
            color: white;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
        }

        .container {
            width: 600px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .content {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .contact-info {
            flex: 1;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
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
            cursor: pointer; /* Farenin üstüne geldiğinde işaretçiyi el şekline dönüştürür */
        }

        .contact-info i:hover { /* Farenin üstüne gelindiğinde stil değişikliği yapar */
            color: orange; /* Font simgesinin rengi turuncu yapılır */
        }
        
        .contact-info p a {
            color: white; /* Konum metninin rengini beyaz yapar */
            text-decoration: none; /* Link altı çizgisini kaldırır */
        }

        .contact-info p a:hover {
            color: orange; /* Yazının rengini turuncuya dönüştürür */
            cursor: pointer; /* İşaretçiyi el şekline dönüştürür */
        }

        .support-form {
            flex: 2;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
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
        <div class="contact-info">
                <h2>Contact Information</h2>
                <p><a href="https://www.google.com/maps/dir//5.+Levent+Mahallesi,+34060+Ey%C3%BCpsultan%2F%C4%B0stanbul/@41.0858043,28.8698012,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x14cab7ade6455895:0x8162d5a16546b5e2!2m2!1d28.952202!2d41.0858337?entry=ttu"><i class="fas fa-map-marker-alt"></i>  5. Levent Mahallesi, 34060 Eyüpsultan/İstanbul</a></p> <!-- Adres eklendi -->
                <p><i class="fas fa-phone"></i><strong>Phone:</strong> 555-555-555</p>
                <p><i class="fas fa-envelope"></i><strong>Email:</strong>  </p>
                <p>  ahsenarslan@gmail.com</p>
                <p>  selcukkaraca@gmail.com</p>
                <p>  ahmetkarakas@gmail.com</p>
                <p>  mehmetcetinunal@gmail.com</p>
                <p>  efekanefe@gmail.com</p>
              
            </div>

        </div>
    </div>
</body>
</html>
