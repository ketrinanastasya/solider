<?php
$hasil = "";
$keterangan = "";
$jenis = $_POST['jenis'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($jenis == "profesi") {
        $penghasilan = $_POST['penghasilan'] ?? 0;
        $bonus = $_POST['bonus'] ?? 0;
        $hutang = $_POST['hutang'] ?? 0;

        $total = ($penghasilan + $bonus - $hutang);
        $zakat = $total * 0.025;

        $hasil = number_format($zakat, 0, ',', '.');
        $keterangan = ($total >= 6730000) ? "Wajib Zakat (melewati nisab)" : "Belum mencapai nisab";
    }

    if ($jenis == "maal") {
        $deposito = $_POST['deposito'] ?? 0;
        $properti = $_POST['properti'] ?? 0;
        $emas = $_POST['emas'] ?? 0;
        $saham = $_POST['saham'] ?? 0;
        $hutang = $_POST['hutang'] ?? 0;

        $total = ($deposito + $properti + $emas + $saham - $hutang);
        $zakat = $total * 0.025;

        $hasil = number_format($zakat, 0, ',', '.');
        $keterangan = ($total >= 85000000) ? "Wajib Zakat (melewati nisab)" : "Belum mencapai nisab";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kalkulator Zakat</title>
  <link rel="stylesheet" href="kalkulator_zakat.css">

  </style>
  <script>
    function showTab(tabId) {
      const tabs = document.querySelectorAll(".tab-content");
      tabs.forEach(t => t.classList.remove("active"));
      document.getElementById(tabId).classList.add("active");

      const buttons = document.querySelectorAll(".tab-btn");
      buttons.forEach(b => b.classList.remove("active"));
      document.querySelector(`[data-tab="${tabId}"]`).classList.add("active");
    }

    window.onload = function () {
      showTab("profesiTab");
    };
  </script>
</head>
<body>

<h2>Kalkulator Zakat</h2>

<div class="tabs">
  <div class="tab-btn active" data-tab="profesiTab" onclick="showTab('profesiTab')">Profesi</div>
  <div class="tab-btn" data-tab="maalTab" onclick="showTab('maalTab')">Maal</div>
</div>

<div id="profesiTab" class="tab-content active">
  <form method="POST">
    <input type="hidden" name="jenis" value="profesi">
    <label>Penghasilan per Bulan</label>
    <input type="number" name="penghasilan" required>
    <label>Bonus / THR / lainnya</label>
    <input type="number" name="bonus">
    <label>Hutang Jatuh Tempo Bulan Ini</label>
    <input type="number" name="hutang">
    <button type="submit">Hitung Zakat Profesi</button>
  </form>
</div>

<div id="maalTab" class="tab-content">
  <form method="POST">
    <input type="hidden" name="jenis" value="maal">
    <label>Nilai Deposito / Tabungan / Giro</label>
    <input type="number" name="deposito" required>
    <label>Properti dan Kendaraan</label>
    <input type="number" name="properti">
    <label>Emas, Perak, Permata</label>
    <input type="number" name="emas">
    <label>Saham & Surat Berharga</label>
    <input type="number" name="saham">
    <label>Hutang Jatuh Tempo Tahun Ini</label>
    <input type="number" name="hutang">
    <button type="submit">Hitung Zakat Maal</button>
  </form>
</div>

<?php if (isset($jumlah_zakat) && $jumlah_zakat > 0): ?>
  <form action="form_zakat.php" method="GET">
    <input type="hidden" name="jumlah_zakat" value="<?= htmlspecialchars($jumlah_zakat) ?>">
    <button type="submit" class="btn-bayar">Bayar Sekarang</button>
  </form>
<?php endif; ?>

<?php if ($hasil): ?>
  <div class="result">
    <strong>Hasil Perhitungan:</strong><br>
    Total Zakat: Rp<?= $hasil; ?><br>
    Status: <?= $keterangan; ?>
    
    <form action="form_zakat.php" method="POST" style="margin-top: 15px;">
      <input type="hidden" name="jumlah_zakat" value="<?= str_replace('.', '', $hasil); ?>">
      <input type="hidden" name="jenis_zakat" value="<?= $jenis; ?>">
      <button type="submit" class="btn">Bayar Zakat Sekarang</button>
    </form>
  </div>
<?php endif; ?>

</body>
</html>
