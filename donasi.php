<?php
include 'koneksi.php';

// Ambil data kampanye donasi dari database
$query = "SELECT * FROM kampanye WHERE id_kategori = 3"; // 3 untuk kategori Donasi
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Donasi - Solider</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Program Donasi</h1>
  <p>Ayo bantu saudara kita yang membutuhkan melalui program donasi berikut:</p>
</header>

<section class="donasi-container">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="donasi-card">
      <img src="gambar/<?php echo $row['gambar']; ?>" alt="Gambar Kampanye">
      <h3><?php echo $row['judul']; ?></h3>
      <p><?php echo $row['deskripsi']; ?></p>
      <p><strong>Target:</strong> Rp<?php echo number_format($row['target_dana'], 0, ',', '.'); ?></p>
      <p><strong>Terkumpul:</strong> Rp<?php echo number_format($row['terkumpul'], 0, ',', '.'); ?></p>
      <a href="form_donasi.php?id=<?php echo $row['id_kampanye']; ?>" class="btn">Donasi Sekarang</a>
    </div>
  <?php } ?>
</section>

</body>
</html>
