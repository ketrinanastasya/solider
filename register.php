<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (nama_lengkap, email, password)
                         VALUES ('$nama', '$email', '$password')");

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun Solider</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 style="text-align:center;">Daftar Akun Solider</h2>

<form method="POST">
  <input type="text" name="nama" placeholder="Nama Lengkap" required>
  <input type="email" name="email" placeholder="Email" required>

  <input type="password" name="password" id="password" placeholder="Password" required>

  <label>
    <input type="checkbox" onclick="togglePassword()"> Tampilkan Password
  </label>

  <button type="submit" name="submit">DAFTAR</button>
</form>

<p style="text-align:center;">Sudah punya akun? <a href="login.php">Login di sini</a></p>

<!-- Script agar password bisa ditampilkan -->
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
