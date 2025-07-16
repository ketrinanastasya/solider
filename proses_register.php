<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO users (nama_lengkap, email, password)
                     VALUES ('$nama', '$email', '$password')");

header("Location: login.php");
exit();
?>
