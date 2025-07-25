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
  <title>Solider - Donasi</title>
  <link rel="stylesheet" href="donasi.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <h1>Donasi untuk Bersama Melindungi:</h1>
    <div class="category-grid">
      <a href="donasi.php?kategori=bencana" class="category-card"><i class="fas fa-water"></i><span>Bencana Alam</span></a>
      <a href="donasi.php?kategori=anak" class="category-card"><i class="fas fa-baby"></i><span>Balita & Anak Sakit</span></a>
      <a href="donasi.php?kategori=kesehatan" class="category-card"><i class="fas fa-briefcase-medical"></i><span>Bantuan Medis</span></a>
      <a href="donasi.php?kategori=pendidikan" class="category-card"><i class="fas fa-graduation-cap"></i><span>Bantuan Pendidikan</span></a>
      <a href="donasi.php?kategori=lingkungan" class="category-card"><i class="fas fa-leaf"></i><span>Lingkungan</span></a>
      <a href="donasi.php?kategori=sosial" class="category-card"><i class="fas fa-hands-helping"></i><span>Kegiatan Sosial</span></a>
      <a href="donasi.php?kategori=infrastruktur" class="category-card"><i class="fas fa-road"></i><span>Infrastruktur Umum</span></a>
      <a href="donasi.php?kategori=usaha" class="category-card"><i class="fas fa-lightbulb"></i><span>Karya Kreatif</span></a>
      <a href="donasi.php?kategori=hewan" class="category-card"><i class="fas fa-dog"></i><span>Menolong Hewan</span></a>
      <a href="donasi.php?kategori=ibadah" class="category-card"><i class="fas fa-mosque"></i><span>Rumah Ibadah</span></a>
      <a href="donasi.php?kategori=difabel" class="category-card"><i class="fas fa-wheelchair"></i><span>Difabel</span></a>
      <a href="donasi.php?kategori=zakat" class="category-card"><i class="fas fa-hand-holding-usd"></i><span>Zakat</span></a>
      <a href="donasi.php?kategori=panti" class="category-card"><i class="fas fa-home"></i><span>Panti Asuhan</span></a>
      <a href="donasi.php?kategori=kemanusiaan" class="category-card"><i class="fas fa-users"></i><span>Kemanusiaan</span></a>
      <a href="donasi.php?kategori=wakaf" class="category-card"><i class="fas fa-university"></i><span>Wakaf</span></a>
      <a href="donasi.php?kategori=asuransi" class="category-card"><i class="fas fa-shield-alt"></i><span>Asuransi</span></a>
      <a href="donasi.php?kategori=masjid" class="category-card"><i class="fas fa-kaaba"></i><span>Masjid Berdaya</span></a>
    </div>

    <?php if (isset($_GET['kategori'])): ?>
      <div class="campaigns">
        <h2>Kampanye untuk kategori: <?= htmlspecialchars($_GET['kategori']) ?></h2>
        <div class="campaign-card">
          <h3>Bantu Pembangunan Sekolah Terpencil</h3>
          <p>Ayo bantu anak-anak di daerah terpencil untuk mendapat pendidikan layak.</p>
          <div class="progress-bar">
            <div class="progress" style="width: 70%"></div>
          </div>
          <p>Rp7.000.000 dari Rp10.000.000</p>
        </div>
        <!-- Tambahkan kampanye lainnya di sini -->
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
