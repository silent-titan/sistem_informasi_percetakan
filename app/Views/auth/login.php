<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Percetakan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/theme.css">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <?php include __DIR__ . '/../shared/flash.php'; ?>
        <div class="card p-4">
          <h4 class="mb-3 text-center">Login</h4>
          <form method="post" action="/login">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label class="form-label">Username / Email</label>
              <input name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Masuk</button>
          </form>
          <hr>
          <div class="text-center">
            <small>Belum punya akun?</small><br>
            <a href="/register" class="btn btn-outline-secondary w-100 mt-2">Daftar disini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>