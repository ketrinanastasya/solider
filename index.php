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
  <title>Solider - Halaman Utama</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>

<header class="navbar">
  <div class="logo">Solider</div>
  <nav>
    <a href="profil.php" class="icon-link">
      <img src="https://img.icons8.com/ios-glyphs/30/ffffff/user--v1.png" alt="User Icon">
    </a>
    <span class="user-name">
  Halo, <?php echo isset($_SESSION['user_nama']) ? htmlspecialchars($_SESSION['user_nama']) : 'Pengguna'; ?>
</span>

    <button class="btn-logout" onclick="logout()">Logout</button>
  </nav>
</header>

<section class="hero">
  <h1>Selamat Datang di Solider</h1>
  <p>Ulurkan tanganmu untuk membantu mereka yang membutuhkan.</p>
</section>

<section class="kategori-menu">
  <a href="zakat.php" class="menu-item">
    <img src="https://img.icons8.com/color/96/money.png" alt="Zakat">
    <span>Zakat</span>
  </a>
  <a href="galang_dana.php" class="menu-item">
    <img src="https://img.icons8.com/color/96/conference-call.png" alt="Galang Dana">
    <span>Galang Dana</span>
  </a>
  <a href="donasi.php" class="menu-item">
    <img src="https://img.icons8.com/color/96/charity.png" alt="Donasi">
    <span>Donasi</span>
  </a>
</section>


<section class="donasi-list">
  <h2>Daftar Kampanye</h2>
  <div class="donasi-container">
    <div class="donasi-card" data-kategori="zakat">
      <img src="https://source.unsplash.com/300x200/?charity" alt="Kampanye Zakat">
      <h3>Zakat Pendidikan</h3>
      <p>Terkumpul: Rp 10.000.000</p>
    </div>
    <div class="donasi-card" data-kategori="galangdana">
      <img src="https://source.unsplash.com/300x200/?mosque" alt="Kampanye Galang Dana">
      <h3>Galang Dana Masjid</h3>
      <p>Terkumpul: Rp 8.500.000</p>
    </div>
    <div class="donasi-card" data-kategori="donasi">
      <img src="https://source.unsplash.com/300x200/?hospital" alt="Kampanye Donasi">
      <h3>Donasi Operasi Medis</h3>
      <p>Terkumpul: Rp 12.700.000</p>
    </div>
  </div>
</section>

<footer class="footer">
  <p>Hubungi kami:</p>
  <div class="social-icons">
    <a href="https://instagram.com/solider_id" target="_blank"><img src="https://img.icons8.com/fluency/48/instagram-new.png"/></a>
    <a href="https://wa.me/6281234567890" target="_blank"><img src="https://img.icons8.com/color/48/whatsapp.png"/></a>
    <a href="mailto:info@solider.id"><img src="https://img.icons8.com/color/48/gmail-new.png"/></a>
    <a href="https://x.com/solider_id" target="_blank"><img src="https://img.icons8.com/color/48/twitter--v1.png"/></a>
  </div>
</footer>

<script>
function logout() {
  window.location.href = 'logout.php';
}
</script>

</body>
</html>
