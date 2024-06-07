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
            opacity: 0.5; /* Adjust the opacity as needed */
            filter: blur(50px); /* Adjust the blur as needed */
            z-index: -1;
        }


        .container {
            width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            background-color: #333;
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
    <header>
        <h1>Support</h1>
    </header>
    <div class="container">
        <div class="content">
          
            <div class="support-form">
                <h2>How can we help you?</h2>
                <p>If you have any questions or need assistance, please fill out the form below and our support team will get back to you as soon as possible.</p>
                <form action="#" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="6" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
