<?php
require 'koneksi.php';
if (isset($_SESSION['id'])) { header('Location: index.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, email, nama FROM member_026 WHERE email=? AND password=? AND aktive='1'");
    $stmt->bind_param('ss', $email, $pass);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    if ($user) {
        $_SESSION['id']    = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama']  = $user['nama'];
        header('Location: index.php'); exit;
    }
    $error = 'Email/password salah atau akun tidak aktif.';
}
include 'header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3 text-center">Login</h4>
        <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
        <form method="post">
          <div class="mb-3"><label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required></div>
          <div class="mb-3"><label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required></div>
          <button class="btn btn-primary w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
