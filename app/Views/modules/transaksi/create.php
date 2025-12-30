<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<h3>Buat Transaksi</h3>
<div class="card p-3">
  <form method="post" action="<?= (session('role')==='admin') ? '/admin/transaksi' : '/karyawan/transaksi'; ?>">
    <?= csrf_field(); ?>
    <div class="row">
      <div class="col-md-4 mb-3"><label class="form-label">Kode</label><input name="kode" class="form-control" required></div>
      <div class="col-md-4 mb-3"><label class="form-label">Pelanggan ID</label><input name="pelanggan_id" type="number" class="form-control" required></div>
      <div class="col-md-4 mb-3"><label class="form-label">Tanggal</label><input name="tanggal" type="datetime-local" class="form-control" required></div>
      <div class="col-md-4 mb-3"><label class="form-label">Status</label>
        <select name="status" class="form-select"><option value="draft">Draft</option><option value="proses">Proses</option><option value="selesai">Selesai</option><option value="batal">Batal</option></select>
      </div>
      <div class="col-md-12 mb-3"><label class="form-label">Catatan</label><textarea name="catatan" class="form-control"></textarea></div>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="<?= (session('role')==='admin') ? '/admin/transaksi' : '/karyawan/transaksi'; ?>" class="btn btn-outline-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection(); ?>