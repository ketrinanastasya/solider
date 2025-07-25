<?php
session_start();
include 'koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        // Cek password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_nama'] = $user['nama_lengkap']; 
            $_SESSION['email'] = $user['email'];


            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Solider</title>
  <link rel="stylesheet" href="login.css">
  <style>
    .error-msg { color: red; margin-top: 10px; }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Login ke Solider</h2>

  <?php if ($error): ?>
    <div class="error-msg"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="login">LOGIN</button>
  </form>

  <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

</body>
</html>
