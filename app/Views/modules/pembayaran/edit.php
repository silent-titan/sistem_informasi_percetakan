<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Edit Pembayaran</h3>

<form action="/admin/pembayaran/<?= $pembayaran['id']; ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="PUT">

    <div class="mb-3">
        <label for="transaksi_id" class="form-label">Transaksi ID</label>
        <input type="number" name="transaksi_id" id="transaksi_id" class="form-control" 
               value="<?= esc($pembayaran['transaksi_id']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" 
               value="<?= date('Y-m-d\TH:i', strtotime($pembayaran['tanggal'])); ?>" required>
    </div>

    <div class="mb-3">
        <label for="metode" class="form-label">Metode Pembayaran</label>
        <select name="metode" id="metode" class="form-select" required>
            <option value="cash" <?= $pembayaran['metode'] === 'cash' ? 'selected' : ''; ?>>Cash</option>
            <option value="transfer" <?= $pembayaran['metode'] === 'transfer' ? 'selected' : ''; ?>>Transfer</option>
            <option value="qris" <?= $pembayaran['metode'] === 'qris' ? 'selected' : ''; ?>>QRIS</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" step="0.01" name="nominal" id="nominal" class="form-control" 
               value="<?= esc($pembayaran['nominal']); ?>" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control"><?= esc($pembayaran['keterangan']); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/admin/pembayaran" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>