<?php
include 'koneksi.php';

$error = '';
$success = '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if (!$email || !$token) {
    $error = "Link reset tidak valid.";
} else {
    // cek token valid & belum kadaluarsa
    $now = date('Y-m-d H:i:s');
    $q = mysqli_query($conn, "SELECT * FROM password_resets WHERE email='$email' AND token='$token' AND expires_at > '$now' LIMIT 1");
    if (mysqli_num_rows($q) == 0) {
        $error = "Token tidak valid atau sudah kadaluarsa.";
    }

    if (isset($_POST['submit'])) {
        $password   = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        if (strlen($password) < 6) {
            $error = "Password minimal 6 karakter.";
        } elseif ($password !== $konfirmasi) {
            $error = "Konfirmasi password tidak cocok.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // update password user
            $upd = mysqli_query($conn, "UPDATE users SET password='$password_hash' WHERE email='$email'");
            if ($upd) {
                // hapus token agar tidak bisa dipakai lagi
                mysqli_query($conn, "DELETE FROM password_resets WHERE email='$email'");
                $success = "Password berhasil direset. Silakan login.";
                header("Refresh: 2; url=login.php");
            } else {
                $error = "Gagal mereset password. Coba lagi.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Reset Password - Solider</title>
  <link rel="stylesheet" href="login.css">
  <style>
    .error-msg { background:#ffe6e6; color:#cc0000; padding:10px; border-radius:6px; margin-bottom:15px; border:1px solid #ffcccc; }
    .success-msg { background:#e6ffea; color:#007a33; padding:10px; border-radius:6px; margin-bottom:15px; border:1px solid #b2f0c0; }
  </style>
</head>
<body>
<div class="login-container">
  <h2>Reset Password</h2>

  <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
  <?php if ($success): ?><div class="success-msg"><?= $success ?></div><?php endif; ?>

  <?php if (empty($success) && empty($error) || (empty($success) && $error && strpos($error, 'Token') === false)): ?>
  <form method="POST" action="">
    <input type="password" name="password" placeholder="Password baru" required>
    <input type="password" name="konfirmasi" placeholder="Konfirmasi password baru" required>
    <button type="submit" name="submit">RESET PASSWORD</button>
  </form>
  <?php endif; ?>

  <p><a href="login.php">Kembali ke Login</a></p>
</div>
</body>
</html>
