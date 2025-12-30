<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Pembayaran</h3>
<div class="card p-3">
    <form method="post" action="/admin/pembayaran">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Transaksi</label>
            <select name="transaksi_id" class="form-control" required>
                <option value="">-- Pilih Transaksi --</option>
                <?php foreach ($transaksi as $t): ?>
                    <option value="<?= $t['id']; ?>">
                        <?= esc($t['id']); ?> - <?= esc($t['status']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Metode</label>
            <select name="metode" class="form-control" required>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
                <option value="qris">QRIS</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/pembayaran" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>