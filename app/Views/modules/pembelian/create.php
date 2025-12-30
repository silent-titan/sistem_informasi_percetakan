<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Pembelian</h3>
<div class="card p-3">
    <form method="post" action="/admin/pembelian">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($suppliers as $s): ?>
                    <option value="<?= $s['id']; ?>"><?= esc($s['nama']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" name="total" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/pembelian" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>