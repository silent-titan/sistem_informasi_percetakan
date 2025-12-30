<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <h3>Edit Layanan</h3>
  <form method="post" action="/admin/layanan/update/<?= $layanan['id']; ?>">
    <?= csrf_field(); ?>
    <div class="mb-3">
      <label class="form-label">Nama Layanan</label>
      <input type="text" name="nama" class="form-control" value="<?= esc($layanan['nama']); ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control"><?= esc($layanan['deskripsi']); ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" step="0.01" name="harga" class="form-control" value="<?= esc($layanan['harga']); ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Satuan</label>
      <input type="text" name="satuan" class="form-control" value="<?= esc($layanan['satuan']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/admin/layanan" class="btn btn-secondary">Batal</a>
  </form>
</div>
<?= $this->endSection(); ?>