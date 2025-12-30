<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h3>Tambah User</h3>
<div class="card p-3">
  <form method="post" action="/admin/users">
    <?= csrf_field(); ?>
    <div class="row">
      <div class="col-md-4 mb-3"><label class="form-label">Username</label><input name="username" class="form-control" required></div>
      <div class="col-md-4 mb-3"><label class="form-label">Nama</label><input name="nama" class="form-control" required></div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
          <option value="admin">Admin</option>
          <option value="karyawan">Karyawan</option>
        </select>
      </div>
      <div class="col-md-4 mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Aktif</label>
        <select name="active" class="form-select">
          <option value="1">Aktif</option>
          <option value="0">Nonaktif</option>
        </select>
      </div>
    </div>
    <button class="btn btn-primary">Simpan</button> <a href="/admin/users" class="btn btn-outline-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection(); ?>