<?php
// Fungsi untuk menangani pembayaran
function processPayment($selectedTopup, $paymentMethod) {
    // Daftar harga top-up
    $prices = [
        "5 Diamonds" => 5000,
        "10 Diamonds" => 10000,
        "50 Diamonds" => 50000,
        "100 Diamonds" => 100000,
        "500 Diamonds" => 500000,
        "1000 Diamonds" => 1000000
    ];

    // Memeriksa apakah top-up yang dipilih ada dalam daftar
    if (array_key_exists($selectedTopup, $prices)) {
        $price = $prices[$selectedTopup];
        // Proses pembayaran berdasarkan metode pembayaran
        // Misalnya, Anda bisa menambahkan logika untuk memproses pembayaran di sini
        return "Pembayaran untuk $selectedTopup dengan harga RP $price menggunakan metode $paymentMethod berhasil diproses.";
    } else {
        return "Top-up yang dipilih tidak valid.";
    }
}

// Contoh penggunaan fungsi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedTopup = $_POST['topup'];
    $paymentMethod = $_POST['payment_method'];
    $confirmationMessage = processPayment($selectedTopup, $paymentMethod);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Legends Top-up</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap');

        body {
            margin: 0;
            font-family: 'Saira Stencil One', Arial, sans-serif;
            background-color: #232324;
            color: rgb(21, 21, 21);
        }
        /* Header styling */
        .header {
            background-color: #e00047;
            padding: 15px;
            position: relative;
        }
        .header img {
            height: 50px;
        }
        .header a {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        /* Banner Section */
        .banner {
            text-align: center;
            margin-top: 20px;
        }
        .banner img {
            max-width: 100%;
            height: auto;
        }

        .tutorial {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 40%;
            float: left;
            margin: 20px;

        }

        /* Navigation */
        .nav-tabs {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .nav-tabs a {
            color: rgb(19, 18, 18);
            padding: 10px 20px;
            text-decoration: none;
            border-bottom: 2px solid transparent;
        }
        .nav-tabs a:hover, .nav-tabs a.active {
            border-bottom: 2px solid #e00047;
        }

    
        .topup-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .topup-option {
            display: inline-block;
            background-color: #fdf8f8e1;
            padding: 20px;
            border: 1px solid #fffffffe;
            border-radius: 10px;
            width: 200px;
            margin: 10px;
        }
        

        .payment-methods {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
      <!-- Header Section -->
      <div class="header">
        <img src="images\Logo RGV.png" alt="Logo" />
        <a href="allahumma.html" style="position: absolute; left: 70px; top: 50%; transform: translateY(-50%); font-size: 24px; color: white;">Rayi Gaming Vault</a>
        <a href="login.html">Login</a>
    </div>
        <!-- Banner Section -->
        <div class="banner">
        <img src="images\Banner ML.png" alt="Banner" width="1100px" height="400px" />
    </div>

        <div class="tutorial">
            <h2>Tutorial Cara Top-up</h2>
            <p>Insert tutorial text or image here</p>
        </div>    
    

<div class="topup-options">
    <form method="POST" action="">
        <input type="hidden" name="topup" id="selectedTopup" value="">
        <div class="topup-option" onclick="selectTopup('5 Diamonds')">
            <h2>5 Diamonds</h2>
            <p>RP 5,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="topup-option" onclick="selectTopup('10 Diamonds')">
            <h2>10 Diamonds</h2>
            <p>RP 10,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="topup-option" onclick="selectTopup('50 Diamonds')">
            <h2>50 Diamonds</h2>
            <p>RP 50,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="topup-option" onclick="selectTopup('100 Diamonds')">
            <h2>100 Diamonds</h2>
            <p>RP 100,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="topup-option" onclick="selectTopup('500 Diamonds')">
            <h2>500 Diamonds</h2>
            <p>RP 500,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="topup-option" role="button" tabindex="0" onclick="selectTopup('1000 Diamonds')">
            <h2>1000 Diamonds</h2>
            <p>RP 1,000,000</p>
            <button type="button">Top-up</button>
        </div>
        <div class="payment-methods"id="selectedTopupDisplay" style="display: none; margin-bottom: 20px;">
            <h3>Top-up yang Dipilih: <span id="topupName"></span></h3>
        </div>
        <div class="payment-methods" style="display: none;" id="paymentMethods">
            <h3>Pilih Metode Pembayaran</h3>
            <select name="payment_method">
                <option value="Credit Card">Credit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
            <button type="submit">Checkout</button>
    </form>
</div>
<script>
    function selectTopup(topup) {
        document.getElementById('selectedTopup').value = topup;
        document.getElementById('topupName').textContent = topup;
        document.getElementById('selectedTopupDisplay').style.display = 'block';
        document.getElementById('paymentMethods').style.display = 'block';
    }
    
</script>
<
</body>
</html>
