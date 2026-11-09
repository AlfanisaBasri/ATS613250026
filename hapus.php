<?php
require 'koneksi.php';
cek_login();
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("DELETE FROM mobil026 WHERE no_id=?");
$stmt->bind_param('i', $id);
$stmt->execute();
header('Location: index.php?msg=' . urlencode('Data berhasil dihapus'));
