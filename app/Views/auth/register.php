<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Percetakan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/theme.css">
</head>
<body>
    <div class="register-wrapper">
  <div class="register-card">
    <h4>Register Pelanggan</h4>
    <form method="post" action="/register">
      <?= csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control">
      </div>
      <button class="btn btn-primary w-100">Daftar</button>
    </form>
    <hr>
    <div class="text-center">
      <a href="/login" class="btn btn-outline-secondary w-100 mt-2">Sudah punya akun? Login</a>
    </div>
  </div>
</div>
</body>
</html>