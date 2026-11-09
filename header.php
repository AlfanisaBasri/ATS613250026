<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rental Mobil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Rental Mobil Al Fanisa Basri</a>
    <?php if (isset($_SESSION['id'])): ?>
    <div class="text-white">
      <?= htmlspecialchars($_SESSION['nama']) ?> (<?= htmlspecialchars($_SESSION['email']) ?>)
      <a href="logout.php" class="btn btn-sm btn-outline-light ms-2">Logout</a>
    </div>
    <?php endif; ?>
  </div>
</nav>
<main class="container my-4 flex-grow-1">
