<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h3>Dashboard Admin</h3>
<div class="row">
  <div class="col-md-4"><div class="card p-3"><div class="fw-bold">Transaksi</div><div><?= $stats['totalTransaksi']; ?></div></div></div>
  <div class="col-md-4"><div class="card p-3"><div class="fw-bold">Bahan</div><div><?= $stats['totalBahan']; ?></div></div></div>
  <div class="col-md-4"><div class="card p-3"><div class="fw-bold">Pelanggan</div><div><?= $stats['totalPelanggan']; ?></div></div></div>
</div>
<?= $this->endSection(); ?>