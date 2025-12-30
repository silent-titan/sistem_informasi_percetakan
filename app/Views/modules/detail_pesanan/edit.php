<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Edit Detail Pesanan</h3>
<div class="card p-3">
    <form method="post" action="/admin/detail_pesanan/<?= $detail['id']; ?>">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">Transaksi ID</label>
                <input type="number" class="form-control" value="<?= esc($detail['transaksi_id']); ?>" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Layanan ID</label>
                <input name="layanan_id" type="number" class="form-control" value="<?= esc($detail['layanan_id']); ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Bahan ID</label>
                <input name="bahan_id" type="number" class="form-control" value="<?= esc($detail['bahan_id']); ?>">
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label">Deskripsi</label>
                <input name="deskripsi" class="form-control" value="<?= esc($detail['deskripsi']); ?>">
            </div>
            <div class="col-md-2 mb-3">
                <label class="form-label">Qty</label>
                <input name="qty" type="number" class="form-control" value="<?= esc($detail['qty']); ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Harga</label>
                <input name="harga" type="number" step="0.01" class="form-control" value="<?= esc($detail['harga']); ?>" required>
            </div>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/admin/detail_pesanan" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>