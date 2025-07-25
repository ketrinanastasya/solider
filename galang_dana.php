<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM kampanye ORDER BY tanggal DESC";
$result = $conn->query($sql);
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

        <section class="kampanye-wrapper">
            <h3>📂 Daftar Kampanye</h3>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="kampanye-card">
                        <img src="<?= $row['gambar'] ?>" alt="Gambar Kampanye">
                        <h4><?= htmlspecialchars($row['judul']) ?></h4>
                        <p><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?= ($row['terkumpul'] / $row['target_dana']) * 100 ?>%"></div>
                        </div>
                        <p><strong>Terkumpul:</strong> Rp<?= number_format($row['terkumpul'], 0, ',', '.') ?> /
                           <strong>Target:</strong> Rp<?= number_format($row['target_dana'], 0, ',', '.') ?></p>
                        <a href="donasi.php?id_kampanye=<?= $row['id_kampanye'] ?>" class="btn-donasi">Donasi Sekarang</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada kampanye.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>© 2025 Solider. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
