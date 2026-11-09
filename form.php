<?php
require 'koneksi.php';
cek_login();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$row = ['nomor_kendaraan'=>'','jenis_kendaraan'=>'Sedan','pemilik'=>'','tahun_pembuatan'=>''];

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM mobil026 WHERE no_id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    if (!$row) { header('Location: index.php'); exit; }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = $_POST['nomor_kendaraan'];
    $jenis = $_POST['jenis_kendaraan'];
    $pem   = $_POST['pemilik'];
    $tahun = $_POST['tahun_pembuatan'];
    if ($id) {
        $stmt = $conn->prepare("UPDATE mobil026 SET nomor_kendaraan=?, jenis_kendaraan=?, pemilik=?, tahun_pembuatan=? WHERE no_id=?");
        $stmt->bind_param('ssssi', $nomor, $jenis, $pem, $tahun, $id);
        $msg = 'Data berhasil diubah';
    } else {
        $stmt = $conn->prepare("INSERT INTO mobil026 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $nomor, $jenis, $pem, $tahun);
        $msg = 'Data berhasil ditambah';
    }
    $stmt->execute();
    header('Location: index.php?msg=' . urlencode($msg)); exit;
}
include 'header.php';
?>
<div class="row justify-content-center"><div class="col-md-6">
<div class="card shadow-sm"><div class="card-body">
  <h4 class="mb-3"><?= $id ? 'Edit' : 'Tambah' ?> Kendaraan</h4>
  <form method="post">
    <div class="mb-3"><label class="form-label">Nomor Kendaraan</label>
      <input name="nomor_kendaraan" maxlength="12" class="form-control" required
             value="<?= htmlspecialchars($row['nomor_kendaraan']) ?>"></div>
    <div class="mb-3"><label class="form-label">Jenis Kendaraan</label>
      <select name="jenis_kendaraan" class="form-select">
        <?php foreach (['Sedan','Pickup','Truk','Bemo'] as $j): ?>
          <option <?= $row['jenis_kendaraan']===$j ? 'selected' : '' ?>><?= $j ?></option>
        <?php endforeach; ?>
      </select></div>
    <div class="mb-3"><label class="form-label">Pemilik</label>
      <input name="pemilik" maxlength="50" class="form-control" required
             value="<?= htmlspecialchars($row['pemilik']) ?>"></div>
    <div class="mb-3"><label class="form-label">Tahun Pembuatan</label>
      <input name="tahun_pembuatan" maxlength="4" pattern="\d{4}" class="form-control" required
             value="<?= htmlspecialchars($row['tahun_pembuatan']) ?>"></div>
    <button class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</div></div></div></div>
<?php include 'footer.php'; ?>
