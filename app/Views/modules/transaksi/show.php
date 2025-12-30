<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<h3>Detail Transaksi - <?= esc($transaksi['kode']); ?></h3>

<div class="card p-3 mb-3">
  <div><strong>Pelanggan:</strong> <?= esc($pelanggan['nama'] ?? $transaksi['pelanggan_id']); ?></div>
  <div><strong>Tanggal:</strong> <?= esc($transaksi['tanggal']); ?></div>
  <div><strong>Status:</strong> <span class="badge bg-info"><?= esc($transaksi['status']); ?></span></div>
  <div><strong>Total:</strong> <?= number_format($transaksi['total'], 2); ?></div>
</div>

<div class="card p-3 mb-3">
  <h5>Item Pesanan</h5>
  <table class="table table-sm">
    <thead>
      <tr>
        <th>Deskripsi</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody><?php foreach ($items as $it): ?><tr>
          <td><?= esc($it['deskripsi']); ?></td>
          <td><?= esc($it['qty']); ?></td>
          <td><?= number_format($it['harga'], 2); ?></td>
          <td><?= number_format($it['subtotal'], 2); ?></td>
        </tr><?php endforeach; ?></tbody>
  </table>
  <form method="post" action="/admin/transaksi/<?= $transaksi['id']; ?>/addItem" class="row g-2">
    <?= csrf_field(); ?>
    <div class="col-md-4"><input name="deskripsi" class="form-control" placeholder="Deskripsi" required></div>
    <div class="col-md-2"><input name="qty" type="number" class="form-control" value="1" required></div>
    <div class="col-md-2"><input name="harga" type="number" step="0.01" class="form-control" value="0" required></div>
    <div class="col-md-2"><button class="btn btn-outline-primary w-100">Tambah Item</button></div>
  </form>
</div>

<div class="card p-3">
  <h5>Update Status</h5>
  <form method="post" action="/admin/transaksi/<?= $transaksi['id']; ?>/updateStatus">
    <?= csrf_field(); ?>
    <select name="status" class="form-select w-auto d-inline-block me-2">
      <option value="draft">Draft</option>
      <option value="proses">Proses</option>
      <option value="selesai">Selesai</option>
      <option value="batal">Batal</option>
    </select>
    <button class="btn btn-primary">Simpan</button>
  </form>
</div>
<?= $this->endSection(); ?>