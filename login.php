<?php
session_start();
include 'koneksi.php';

$error_msg = '';

if (isset($_POST['login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Format email tidak valid!";
    } elseif (empty($password)) {
        $error_msg = "Password tidak boleh kosong!";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($cek) === 1) {
            $user = mysqli_fetch_assoc($cek);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nama'] = $user['nama_lengkap'];
                header("Location: index.php");
                exit();
            } else {
                $error_msg = "Password salah!";
            }
        } else {
            $error_msg = "Email tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Solider</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
  <h2>Login ke <span>Solider</span></h2>

  <?php if (!empty($error_msg)) : ?>
    <div class="error-msg"><?php echo $error_msg; ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" id="password" placeholder="Password" required>

    <label class="show-password">
      <input type="checkbox" onclick="togglePassword()"> Tampilkan Password
    </label>

    <button type="submit" name="login">LOGIN</button>
  </form>

  <p><a href="forgot_password.php">Lupa password?</a></p>
  <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>

<script>
function togglePassword() {
  const pwd = document.getElementById("password");
  pwd.type = (pwd.type === "password") ? "text" : "password";
}
</script>

</body>
</html>
