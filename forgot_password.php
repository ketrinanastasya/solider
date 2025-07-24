<?php
include 'koneksi.php';

$info = '';
$error = '';

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);

    // cek email ada atau tidak
    $q = mysqli_query($conn, "SELECT id_user FROM users WHERE email='$email'");
    if (mysqli_num_rows($q) == 0) {
        $error = "Email tidak terdaftar!";
    } else {
        // generate token + simpan
        $token   = bin2hex(random_bytes(32)); // 64 chars
        $expires = date('Y-m-d H:i:s', time() + 3600); // 1 jam

        // (opsional) hapus token lama
        mysqli_query($conn, "DELETE FROM password_resets WHERE email='$email'");

        $ins = mysqli_query($conn, "INSERT INTO password_resets (email, token, expires_at) VALUES ('$email', '$token', '$expires')");
        if ($ins) {
            // mode dev: tampilkan link langsung
            $reset_link = "http://localhost/Solider/reset_password.php?token=$token&email=" . urlencode($email);
            $info = "Link reset password (berlaku 1 jam): <br><a href='$reset_link'>$reset_link</a>";
            // nanti kalau sudah pakai email, kamu kirim $reset_link via PHPMailer
        } else {
            $error = "Gagal membuat token reset. Coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lupa Password - Solider</title>
  <link rel="stylesheet" href="login.css"> <!-- boleh pakai css login/register biar konsisten -->
  <style>
    .error-msg { background:#ffe6e6; color:#cc0000; padding:10px; border-radius:6px; margin-bottom:15px; border:1px solid #ffcccc; }
    .success-msg { background:#e6ffea; color:#007a33; padding:10px; border-radius:6px; margin-bottom:15px; border:1px solid #b2f0c0; }
  </style>
</head>
<body>
<div class="login-container">
  <h2>Lupa Password</h2>

  <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
  <?php if ($info): ?><div class="success-msg"><?= $info ?></div><?php endif; ?>

  <form method="POST" action="">
    <input type="email" name="email" placeholder="Masukkan email akun Anda" required>
    <button type="submit" name="submit">KIRIM LINK RESET</button>
  </form>

  <p><a href="login.php">Kembali ke Login</a></p>
</div>
</body>
</html>
