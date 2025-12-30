<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<h3>Tambah Detail Pembelian</h3>
<div class="card p-3">
    <form method="post" action="/admin/detail_pembelian">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label>Pembelian ID</label>
                <select name="pembelian_id" class="form-control" required>
                    <?php foreach ($pembelian as $p): ?>
                        <option value="<?= esc($p['id']); ?>"><?= esc($p['id']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label>Bahan ID</label>
                <select name="bahan_id" class="form-control" required>
                    <?php foreach ($bahan as $b): ?>
                        <option value="<?= esc($b['id']); ?>"><?= esc($b['nama']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label>Qty</label>
                <input name="qty" type="number" class="form-control" value="1" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Harga</label>
                <input name="harga" type="number" step="0.01" class="form-control" value="0" required>
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/detail_pembelian" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>