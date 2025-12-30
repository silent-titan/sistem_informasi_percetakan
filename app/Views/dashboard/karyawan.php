<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h3>Dashboard Karyawan</h3>
<div class="card p-3">
  <div class="fw-bold">Transaksi Hari Ini</div>
  <div><?= $stats['transaksiHariIni']; ?></div>
</div>
<?= $this->endSection(); ?>