<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Detail Pesanan</h3>
<div class="card p-3">
    <form method="post" action="/admin/detail_pesanan">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">Transaksi ID</label>
                <input name="transaksi_id" type="number" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Layanan ID</label>
                <input name="layanan_id" type="number" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Bahan ID</label>
                <input name="bahan_id" type="number" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label">Deskripsi</label>
                <input name="deskripsi" class="form-control">
            </div>
            <div class="col-md-2 mb-3">
                <label class="form-label">Qty</label>
                <input name="qty" type="number" class="form-control" value="1" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Harga</label>
                <input name="harga" type="number" step="0.01" class="form-control" value="0" required>
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/detail_pesanan" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>