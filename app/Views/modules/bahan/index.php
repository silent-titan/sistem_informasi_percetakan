<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3">
  <h3>Data Bahan</h3>
  <?php if (session('role') === 'admin'): ?><a href="/admin/bahan/new" class="btn btn-primary">Tambah</a><?php endif; ?>
</div>
<div class="card p-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Harga Beli</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody><?php foreach ($items ?? [] as $it): ?><tr>
          <td><?= esc($it['id']); ?></td>
          <td><?= esc($it['nama']); ?></td>
          <td><?= esc($it['stok']); ?></td>
          <td><?= esc($it['satuan']); ?></td>
          <td><?= number_format($it['harga_beli'], 2); ?></td>
          <td><?php if (session('role') === 'admin'): ?>
              <a href="/admin/bahan/<?= $it['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="/admin/bahan/<?= $it['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus bahan ini?')">Hapus</button>
              </form>
          </td>
        </tr><?php endif; ?><?php endforeach; ?></tbody>
  </table><?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>