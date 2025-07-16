<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id']   = $user['id_user'];
            $_SESSION['user_nama'] = $user['nama_lengkap'];

            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Solider</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 style="text-align:center;">Login Akun Solider</h2>

<form method="POST">
  <input type="email" name="email" placeholder="Email" required>

  <input type="password" name="password" id="password" placeholder="Password" required>

  <label>
    <input type="checkbox" onclick="togglePassword()"> Tampilkan Password
  </label>

  <button type="submit" name="login">LOGIN</button>
</form>

<p style="text-align:center;">Belum punya akun? <a href="register.php">Daftar di sini</a></p>

<!-- Script untuk menampilkan / menyembunyikan password -->
<script>
function togglePassword() {
  var pwd = document.getElementById("password");
  if (pwd.type === "password") {
    pwd.type = "text";
  } else {
    pwd.type = "password";
  }
}
</script>

</body>
</html>
