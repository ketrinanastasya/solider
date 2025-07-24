<?php
include 'koneksi.php';

$nama = "";
$email = "";
$error = "";
$success = "";

if (isset($_POST['register'])) {
    $nama       = trim($_POST['nama']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    // VALIDASI
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } elseif ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = mysqli_query($conn, "INSERT INTO users (nama_lengkap, email, password) VALUES ('$nama', '$email', '$password_hash')");

            if ($insert) {
                $success = "Registrasi berhasil! Silakan login.";
                header("Refresh: 2; url=login.php");
            } else {
                $error = "Registrasi gagal. Silakan coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun Solider</title>
  <link rel="stylesheet" href="register.css">
  <style>
    .error-msg { color: red; margin-top: 10px; }
    .success-msg { color: green; margin-top: 10px; }
    input:invalid { border-color: red; }
  </style>
</head>
<body>

<div class="register-container">
  <h2>Daftar Akun Solider</h2>

  <?php if ($error): ?>
    <div class="error-msg"><?= $error ?></div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="success-msg"><?= $success ?></div>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="nama" placeholder="Nama Lengkap" value="<?= htmlspecialchars($nama) ?>" required>

    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>

    <input type="password" name="password" id="password" placeholder="Password" required>

    <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi Password" required>

    <label class="show-password">
      <input type="checkbox" onclick="togglePassword()"> Tampilkan Password
    </label>

    <button type="submit" name="register">DAFTAR</button>
  </form>

  <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

<script>
function togglePassword() {
  var pwd = document.getElementById("password");
  var konfirmasi = document.getElementById("konfirmasi");
  pwd.type = pwd.type === "password" ? "text" : "password";
  konfirmasi.type = konfirmasi.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
