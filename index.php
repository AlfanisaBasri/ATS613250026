<?php
require 'koneksi.php';
cek_login();
$data = $conn->query("SELECT * FROM mobil026 ORDER BY no_id");
include 'header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Data Kendaraan</h4>
  <a href="form.php" class="btn btn-success">+ Tambah Data</a>
</div>
<?php if (isset($_GET['msg'])): ?>
  <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
<?php endif; ?>
<div class="card shadow-sm"><div class="table-responsive">
<table class="table table-striped table-hover mb-0">
  <thead class="table-dark">
    <tr><th>No</th><th>Nomor Kendaraan</th><th>Jenis</th><th>Pemilik</th><th>Tahun</th><th>Aksi</th></tr>
  </thead>
  <tbody>
  <?php $no = 1; while ($r = $data->fetch_assoc()): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($r['nomor_kendaraan']) ?></td>
      <td><?= $r['jenis_kendaraan'] ?></td>
      <td><?= htmlspecialchars($r['pemilik']) ?></td>
      <td><?= $r['tahun_pembuatan'] ?></td>
      <td>
        <a href="form.php?id=<?= $r['no_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $r['no_id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table></div></div>
<?php include 'footer.php'; ?>
