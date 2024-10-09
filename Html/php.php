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