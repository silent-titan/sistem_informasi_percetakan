<?= $this->extend('layout/sidebar_pelanggan'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <h3>Pesanan Saya</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pesanan as $p): ?>
        <tr>
          <td><?= $p['tanggal']; ?></td>
          <td><?= $p['produk_id']; ?></td>
          <td><?= $p['jumlah']; ?></td>
          <td><?= $p['status']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection(); ?>