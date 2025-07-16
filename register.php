<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $simpan = mysqli_query($conn, "INSERT INTO users (nama_lengkap, email, password)
                                   VALUES ('$nama', '$email', '$password')");

    if ($simpan) {
        echo "<script>alert('Pendaftaran Berhasil!'); window.location='login.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>

<h2>Daftar Akun Solider</h2>
<form method="POST">
    <input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="submit">Daftar</button>
</form>
<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
