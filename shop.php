<!DOCTYPE html>
<html lang="tr">
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
            opacity: 0.9; /* Adjust the opacity as needed */
            filter: blur(10px); /* Adjust the blur as needed */
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
            width: 200px; /* Resim genişliği */
            height: auto;
            border-radius: 5px;
            margin-right: 20px;
        }

        .product-details {
            flex: 1; /* Ürün adı ve fiyat kısmını esnek yapmak için */
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
    </style>
</head>
<body>

<div class="container">
    <h1>YOUR SHOP</h1>
    <div class="product">
        <img src=././assets/center/c9.PNG alt="Product 1">
        <div class="product-details">
            <div class="product-name">Lost Ark</div>
            <div class="product-price">$19.99 <i class="fas fa-times delete-product" onclick="deleteProduct(this)"></i></div>
        </div>
    </div>

    <div class="product">
        <img src="path/to/product2.jpg" alt="Product 2">
        <div class="product-details">
            <div class="product-name">Product 2</div>
            <div class="product-price">$24.99 <i class="fas fa-times delete-product" onclick="deleteProduct(this)"></i></div>
        </div>
    </div>

    <div class="product">
        <img src="path/to/product3.jpg" alt="Product 3">
        <div class="product-details">
            <div class="product-name">Product 3</div>
            <div class="product-price">$29.99 <i class="fas fa-times delete-product" onclick="deleteProduct(this)"></i></div>
        </div>
    </div>

    <div class="total-price" id="totalPrice">
        Toplam: $0.00 <!-- Buraya JavaScript ile toplam fiyatı dinamik olarak yazacağız -->
    </div>
</div>

<div class="purchase-options">
    <a href="payment.html"><img src=././assets/icon/credikart.png alt="Credit Card"></a>
    <a href="payment.html"><img src=././assets/icon/debit.jpeg alt="Debit Card"></a>
    <a href="payment.html"><img src=././assets/icon/paypal.png alt="PayPal"></a>
    <a href="payment.html"><img src=././assets/icon/applepay.jpg alt="Apple Pay"></a>
</div>

<script>
    // Ürün fiyatlarını al
    const productPrices = document.querySelectorAll('.product-price');
    // Toplam fiyat değişkeni
    let totalPrice = 0;

    // Her bir ürün fiyatını toplam fiyata ekle
    productPrices.forEach(price => {
        const priceText = price.textContent.trim().replace('$', ''); // '$' işaretini kaldır ve boşlukları temizle
        totalPrice += parseFloat(priceText); // Fiyatı float'a çevirerek toplam fiyata ekle
    });

    // Toplam fiyatı HTML'e yazdır
    const totalPriceElement = document.getElementById('totalPrice');
    totalPriceElement.textContent = `Toplam: $${totalPrice.toFixed(2)}`; // Toplam fiyatı düzgün bir şekilde biçimlendirerek yazdır

    // Ürünü silen fonksiyon
    function deleteProduct(element) {
        const product = element.closest('.product');
        const productPrice = product.querySelector('.product-price').textContent.trim().replace('$', ''); // Silinecek ürünün fiyatını al
        totalPrice -= parseFloat(productPrice); // Toplam fiyattan çıkar
        totalPriceElement.textContent = `Toplam: $${totalPrice.toFixed(2)}`; // Toplam fiyatı güncelle
        product.remove(); // Ürünü sil
    }
</script>

</body>
</html>
