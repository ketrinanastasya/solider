<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php'; // Pastikan file ini berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = htmlspecialchars($_POST['judul']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $target_dana = (int) $_POST['target_dana'];
    $terkumpul = 0; // default saat pertama kali dibuat

    // Upload gambar
    $namaFile = $_FILES['gambar']['name'];
    $tmpFile = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $pathGambar = $folder . time() . "_" . basename($namaFile);
    if (move_uploaded_file($tmpFile, $pathGambar)) {
        // Simpan ke database
        $sql = "INSERT INTO kampanye (judul, deskripsi, target_dana, terkumpul, gambar) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdds", $judul, $deskripsi, $target_dana, $terkumpul, $pathGambar);

        if ($stmt->execute()) {
            echo "<script>alert('Kampanye berhasil dibuat!'); window.location.href='galang_dana.php';</script>";
        } else {
            echo "Gagal menyimpan ke database: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mengupload gambar.";
    }

    $conn->close();
}
?>
