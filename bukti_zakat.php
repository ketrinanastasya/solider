<?php
session_start();

// Cek apakah data zakat tersedia
if (!isset($_SESSION['zakat'])) {
    echo "Tidak ada data zakat yang tersedia.";
    exit;
}

// Ambil data dari session
$zakat = $_SESSION['zakat'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Pembayaran Zakat</title>
  <link rel="stylesheet" href="bukti_zakat.css"> <!-- opsional -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 30px;
    }
    .container {
      background-color: white;
      padding: 30px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: #007BFF;
    }
    .data {
      margin-top: 20px;
    }
    .data p {
      margin: 10px 0;
    }
    .back {
      margin-top: 20px;
      display: inline-block;
      background-color: #007BFF;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
    }
    .back:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Bukti Pembayaran Zakat</h2>
    <div class="data">
      <p><strong>Nama:</strong> <?= $zakat['nama']; ?></p>
      <p><strong>Email:</strong> <?= $zakat['email']; ?></p>
      <p><strong>No HP:</strong> <?= $zakat['hp']; ?></p>
      <p><strong>Jumlah Zakat:</strong> Rp <?= number_format($zakat['jumlah'], 0, ',', '.'); ?></p>
      <p><strong>Lembaga Zakat:</strong> <?= $zakat['lembaga']; ?></p>
      <p><strong>Metode Pembayaran:</strong> <?= $zakat['metode']; ?></p>
    </div>
    <a href="index.php" class="back">Kembali ke Beranda</a>
  </div>
</body>
</html>
