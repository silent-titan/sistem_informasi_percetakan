<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Edit Transaksi</h3>
<div class="card p-3">
    <form method="post" action="/admin/transaksi/<?= $transaksi['id']; ?>">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label class="form-label">Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p['id']; ?>"
                        <?= $p['id'] == $transaksi['pelanggan_id'] ? 'selected' : ''; ?>>
                        <?= esc($p['nama']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="<?= esc($transaksi['tanggal']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" name="total" class="form-control"
                   value="<?= esc($transaksi['total']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <?php foreach (['draft','proses','selesai','batal'] as $s): ?>
                    <option value="<?= $s; ?>"
                        <?= $s == $transaksi['status'] ? 'selected' : ''; ?>>
                        <?= ucfirst($s); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="/admin/transaksi" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>