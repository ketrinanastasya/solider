<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Solider - Zakat</title>
  <link rel="stylesheet" href="zakat.css">
</head>
<body>
  <div class="container">
    <h1>Solider - Zakat</h1>
    <p>
      <a href="index.php">Beranda</a>
      <a href="donasi.php">Donasi</a>
      <a href="zakat.php">Zakat</a>
      <a href="galang_dana.php">Galang Dana</a>
      <a href="logout.php">Logout</a>
    </p>

    <h2 style="color: #007bff;">Siap Menunaikan Zakat?</h2>

    <div class="section">
      <p style="font-size: 3rem;">🤲</p>
      <p>Salurkan zakatmu melalui lembaga amil terpercaya.</p>
      <h2>Salurkan Zakat</h2>
      <a href="form_zakat.php" class="btn">Tunaikan Zakat</a>
    </div>

    <div class="section">
      <p style="font-size: 3rem;">📊</p>
      <p>Hitung kewajiban zakat profesi dan maal secara otomatis.</p>
      <h2>Kalkulator Zakat</h2>
      <a href="kalkulator_zakat.php" class="btn">Hitung Sekarang</a>
    </div>

    <footer>&copy; 2025 Solider. Semua Hak Dilindungi.</footer>
  </div>
</body>
</html>
