<?php
include 'koneksi.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST["email"]);
    $pass1    = trim($_POST["password"]);
    $pass2    = trim($_POST["confirm_password"]);

    // Cek email terdaftar
    $q = mysqli_query($conn, "SELECT id_user FROM users WHERE email='$email'");
    if (mysqli_num_rows($q) == 0) {
        $error = "Email tidak ditemukan.";
    } elseif ($pass1 !== $pass2) {
        $error = "Password dan konfirmasi tidak cocok.";
    } else {
        // Hash password baru
        $hashed = password_hash($pass1, PASSWORD_DEFAULT);
        $up = mysqli_query($conn, "UPDATE users SET password='$hashed' WHERE email='$email'");
        if ($up) {
            $success = "Password berhasil direset! Silakan login.";
        } else {
            $error = "Terjadi kesalahan saat reset password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Solider</title>
    <link rel="stylesheet" href="reset_password.css">
</head>
<body>
<div class="login-container">
    <h2>Reset Password</h2>

    <?php if ($error): ?><div class="error-msg"><?= $error ?></div><?php endif; ?>
    <?php if ($success): ?><div class="success-msg"><?= $success ?></div><?php endif; ?>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email Anda" required>
        <input type="password" name="password" placeholder="Password Baru" required>
        <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
        <button type="submit">RESET PASSWORD</button>
    </form>

    <p><a href="login.php">← Kembali ke Login</a></p>
</div>
</body>
</html>
