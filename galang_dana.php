<?php
include 'koneksi.php';

// Ambil kategori untuk dropdown
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_POST['submit'])) {
  $judul       = $_POST['judul'];
  $deskripsi   = $_POST['deskripsi'];
  $target_dana = $_POST['target_dana'];
  $id_kategori = $_POST['id_kategori'];

  // Upload gambar
  $gambar_name = $_FILES['gambar']['name'];
  $gambar_tmp  = $_FILES['gambar']['tmp_name'];
  $upload_dir  = "gambar/";
  move_uploaded_file($gambar_tmp, $upload_dir . $gambar_name);

  // Simpan data kampanye ke DB
  mysqli_query($conn, "INSERT INTO kampanye (judul, deskripsi, target_dana, terkumpul, gambar, id_kategori)
                       VALUES ('$judul', '$deskripsi', '$target_dana', 0, '$gambar_name', '$id_kategori')");

  echo "<script>alert('Kampanye berhasil dibuat!'); window.location='donasi.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galang Dana - Solider</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h2>Buat Kampanye Galang Dana</h2>
</header>

<section class="form-container">
  <form method="POST" enctype="multipart/form-data">
    <label>Judul Kampanye:</label>
    <input type="text" name="judul" required>

    <label>Deskripsi Kampanye:</label>
    <textarea name="deskripsi" rows="5" required></textarea>

    <label>Target Dana (Rp):</label>
    <input type="number" name="target_dana" required min="1000">

    <label>Kategori:</label>
    <select name="id_kategori" required>
      <option value="">-- Pilih Kategori --</option>
      <?php while ($row = mysqli_fetch_assoc($kategori)) { ?>
        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
      <?php } ?>
    </select>

    <label>Upload Gambar:</label>
    <input type="file" name="gambar" accept="image/*" required>

    <button type="submit" name="submit" class="btn">Buat Kampanye</button>
  </form>
</section>

</body>
</html>
