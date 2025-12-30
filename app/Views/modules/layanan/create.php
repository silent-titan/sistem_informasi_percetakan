<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <h3>Tambah Layanan</h3>
  <form action="/admin/layanan/store" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Layanan</label>
      <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" name="harga" id="harga" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="satuan" class="form-label">Satuan</label>
      <input type="text" name="satuan" id="satuan" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>

<?= $this->endSection(); ?>