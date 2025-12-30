<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Edit Pembelian</h3>
<div class="card p-3">
    <form method="post" action="/admin/pembelian/<?= $pembelian['id']; ?>">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
            <label class="form-label">Kode</label>
            <input type="text" name="kode" class="form-control"
                   value="<?= esc($pembelian['kode']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <input type="text" class="form-control"
                   value="<?= esc($pembelian['supplier_id']); ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="<?= esc($pembelian['tanggal']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" name="total" class="form-control" step="0.01"
                   value="<?= esc($pembelian['total']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control"><?= esc($pembelian['catatan']); ?></textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/admin/pembelian" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>