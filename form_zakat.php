<?php
$jumlah_zakat = $_GET['jumlah_zakat'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pembayaran Zakat</title>
  <link rel="stylesheet" href="form_zakat.css">
</head>
<body>
  <div class="container">
    <h2>Formulir Pembayaran Zakat</h2>
    <form action="proses_zakat.php" method="POST">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>No. HP</label>
      <input type="text" name="hp" required>

      <label>Jumlah Zakat (Rp)</label>
      <input type="text" name="jumlah" value="<?= htmlspecialchars($jumlah_zakat) ?>" >

      <label>Pilih Lembaga Zakat</label>
      <select name="lembaga" required>
        <option value="">-- Pilih --</option>
        <option value="Baznas">Baznas</option>
        <option value="Rumah Zakat">Rumah Zakat</option>
        <option value="Dompet Dhuafa">Dompet Dhuafa</option>
      </select>

      <label>Metode Pembayaran</label>
      <select name="metode" required>
        <option value="">-- Pilih --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet">E-Wallet</option>
        <option value="QRIS">QRIS</option>
      </select>

      <button type="submit">Kirim Donasi</button>
    </form>
  </div>
</body>
</html>
