<?php
// koneksi ke database
include 'koneksi.php';

// proses ketika form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO donasi (nama, email, jumlah, metode_pembayaran, pesan)
              VALUES ('$nama', '$email', '$jumlah', '$metode', '$pesan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Donasi berhasil terkirim. Terima kasih!'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Donasi - Solider</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Form Donasi</h2>
    <form action="form_donasi.php" method="POST" class="donasi-form">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="jumlah" placeholder="Jumlah Donasi (Rp)" required>
        
        <select name="metode" required>
            <option value="">-- Pilih Metode Pembayaran --</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="QRIS">QRIS</option>
            <option value="E-Wallet">E-Wallet</option>
        </select>

        <textarea name="pesan" placeholder="Pesan atau Doa (opsional)" rows="4"></textarea>

        <button type="submit" name="submit">Kirim Donasi</button>
    </form>
</div>

</body>
</html>
