<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Percetakan'); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/theme.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Percetakan</a>
      <div class="d-flex">
        <span class="navbar-text me-3"><?= esc(session('nama')); ?> (<?= esc(session('role')); ?>)</span>
        <a class="btn btn-outline-light btn-sm" href="/logout">Keluar</a>
      </div>
    </div>
  </nav>

  <div class="sidebar">
    <?php include __DIR__ . '/partials/sidebar.php'; ?>
  </div>

  <main class="main">
    <?php include __DIR__ . '/../shared/flash.php'; ?>
    <?= $this->renderSection('content'); ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>