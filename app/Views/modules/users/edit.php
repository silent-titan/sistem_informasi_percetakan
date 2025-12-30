<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h3>Edit User</h3>
<div class="card p-3">
  <form method="post" action="/admin/users/<?= $item['id']; ?>">
    <?= csrf_field(); ?><input type="hidden" name="_method" value="put">
    <div class="row">
      <div class="col-md-4 mb-3"><label class="form-label">Username</label><input name="username" class="form-control" value="<?= esc($item['username']); ?>" required></div>
      <div class="col-md-4 mb-3"><label class="form-label">Nama</label><input name="nama" class="form-control" value="<?= esc($item['nama']); ?>" required></div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
          <option value="admin" <?= $item['role']==='admin'?'selected':''; ?>>Admin</option>
          <option value="karyawan" <?= $item['role']==='karyawan'?'selected':''; ?>>Karyawan</option>
        </select>
      </div>
      <div class="col-md-4 mb-3"><label class="form-label">Password (isi jika ganti)</label><input type="password" name="password" class="form-control"></div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Aktif</label>
        <select name="active" class="form-select">
          <option value="1" <?= $item['active']?'selected':''; ?>>Aktif</option>
          <option value="0" <?= !$item['active']?'selected':''; ?>>Nonaktif</option>
        </select>
      </div>
    </div>
    <button class="btn btn-primary">Update</button> <a href="/admin/users" class="btn btn-outline-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection(); ?>