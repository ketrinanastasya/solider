<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Jika email belum diset di sesi, misalnya karena belum ditambahkan di login.php,
// tambahkan manual jika memang tersedia dari database saat login.
// Contoh: $_SESSION['user_email'] = $user['email']; di login.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna - Solider</title>
  <link rel="stylesheet" href="profil.css">
</head>
<body>

<header class="navbar">
  <div class="logo">Solider</div>
  <nav>
    <a href="index.php">Beranda</a>
    <span class="user-name">Halo, <?php echo $_SESSION['nama']; ?></span>
    <button class="btn-logout" onclick="logout()">Logout</button>
  </nav>
</header>

<main class="profil-container">
  <h2>Profil Pengguna</h2>
  <div class="profil-card">
    <p><strong>Nama:</strong> <?php echo $_SESSION['nama']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>ID Pengguna:</strong> <?php echo $_SESSION['user_id']; ?></p>
  </div>
</main>

<footer class="footer">
  <p>&copy; 2025 Solider. Semua Hak Dilindungi.</p>
</footer>

<script>
function logout() {
  window.location.href = 'logout.php';
}
</script>

</body>
</html>
