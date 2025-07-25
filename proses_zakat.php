<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $hp = htmlspecialchars($_POST['hp']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $lembaga = htmlspecialchars($_POST['lembaga']);
    $metode = htmlspecialchars($_POST['metode']);

    // Validasi sederhana (bisa dikembangkan lebih lanjut)
    if (empty($nama) || empty($email) || empty($jumlah)) {
        echo "Harap isi semua data yang dibutuhkan!";
        exit;
    }

    // Simpan ke session untuk ditampilkan di halaman bukti
    session_start();
    $_SESSION['zakat'] = [
        'nama' => $nama,
        'email' => $email,
        'hp' => $hp,
        'jumlah' => $jumlah,
        'lembaga' => $lembaga,
        'metode' => $metode
    ];

    // Redirect ke halaman bukti
    header("Location: bukti_zakat.php");
    exit;
} else {
    echo "Akses tidak sah.";
    exit;
}
?>
