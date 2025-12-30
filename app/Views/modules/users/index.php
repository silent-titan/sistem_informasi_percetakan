<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3">
  <h3>Users</h3>
  <a href="/admin/users/new" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($users)): ?>
        <?php foreach ($users as $u): ?>
          <tr>
            <td><?= esc($u['id']); ?></td>
            <td><?= esc($u['username']); ?></td>
            <td><?= esc($u['nama']); ?></td>
            <td><?= esc($u['role']); ?></td>
            <td><?= $u['active'] ? 'Aktif' : 'Nonaktif'; ?></td>
            <td>
              <a href="/admin/users/<?= $u['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="/admin/users/<?= $u['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?><input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">Tidak ada data pengguna</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>