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
    <title>Galang Dana - Solider</title>
    <link rel="stylesheet" href="galang_dana.css">
</head>
<body>
    <header>
        <h1>💖 Galang Dana</h1>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="zakat.php">Zakat</a>
            <a href="galang_dana.php" class="active">Galang Dana</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section class="intro">
            <h2>Buat Kampanye Galang Dana Anda</h2>
            <p>Dengan Solider, kamu bisa membuat kampanye galang dana untuk membantu yang membutuhkan.</p>
            <a href="buat_kampanye.php" class="btn">Buat Kampanye Sekarang 🚀</a>
        </section>

        <section class="info">
            <h3>📢 Mengapa Galang Dana di Solider?</h3>
            <ul>
                <li>✅ Mudah digunakan</li>
                <li>✅ Aman dan terpercaya</li>
                <li>✅ Dana cepat cair</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>© 2025 Solider. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
