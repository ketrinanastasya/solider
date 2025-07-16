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
  <link rel="stylesheet" href="style.css">
  <style>
    .navbar {
      background-color: #007BFF;
      color: white;
      display: flex;
      justify-content: space-between;
      padding: 10px 20px;
      align-items: center;
    }
    .navbar .logo {
      font-weight: bold;
      font-size: 20px;
    }
    .navbar nav a, .navbar button {
      margin-left: 15px;
      color: white;
      text-decoration: none;
    }
    .hero {
      text-align: center;
      background-color: #f0f4f8;
      padding: 20px;
    }
    .kategori-menu {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 20px;
    }
    .menu-item {
      text-align: center;
      text-decoration: none;
      color: #333;
    }
    .menu-item img {
      width: 60px;
      height: 60px;
    }
    .donasi-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin: 20px;
    }
    .donasi-card {
      background: white;
      padding: 10px;
      width: 250px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    select {
      padding: 8px;
      margin: 10px;
    }
    .btn-logout {
      background: transparent;
      border: 1px solid white;
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">Solider</div>
  <nav>
    Halo, <?php echo $_SESSION['user_nama']; ?>
    <button class="btn-logout" onclick="logout()">Logout</button>
  </nav>
</header>

<section class="hero">
  <h1>Selamat Datang di Solider</h1>
  <p>Ulurkan tanganmu untuk membantu mereka yang membutuhkan.</p>
</section>

<section class="kategori-menu">
  <a href="#" class="menu-item" onclick="filterDonasi('zakat')">
    <img src="https://img.icons8.com/color/96/money.png" alt="Zakat">
    <span>Zakat</span>
  </a>
  <a href="#" class="menu-item" onclick="filterDonasi('galangdana')">
    <img src="https://img.icons8.com/color/96/conference-call.png" alt="Galang Dana">
    <span>Galang Dana</span>
  </a>
  <a href="#" class="menu-item" onclick="filterDonasi('donasi')">
    <img src="https://img.icons8.com/color/96/charity.png" alt="Donasi">
    <span>Donasi</span>
  </a>
</section>

<section class="donasi-list">
  <h2 style="text-align:center;">Daftar Kampanye</h2>
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

<script>
function filterDonasi(kategori) {
  const cards = document.querySelectorAll('.donasi-card');
  cards.forEach(card => {
    if (kategori === '' || card.dataset.kategori === kategori) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}

function logout() {
  window.location.href = 'logout.php';
}
</script>

</body>
</html>
