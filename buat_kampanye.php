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
    <title>Buat Kampanye - Solider</title>
    <link rel="stylesheet" href="buat_kampanye.css">
</head>
<body>
    <div class="container">
        <h1>🚀 Buat Kampanye Galang Dana</h1>
        <p>Isi data di bawah ini untuk membuat kampanye penggalangan dana.</p>

        <form action="proses_kampanye.php" method="POST" enctype="multipart/form-data">
            <label for="judul">Judul Kampanye</label>
            <input type="text" id="judul" name="judul" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>

            <label for="target_dana">Target Dana (Rp)</label>
            <input type="number" id="target_dana" name="target_dana" required>

            <label for="gambar">Upload Gambar Kampanye</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <button type="submit" class="btn">Buat Kampanye ✅</button>
        </form>
    </div>
</body>
</html>
