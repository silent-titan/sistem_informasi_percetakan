<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Edit Detail Pembelian</h3>
<div class="card p-3">
    <form method="post" action="/admin/detail_pembelian/<?= $detail['id']; ?>">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label>Pembelian ID</label>
                <input type="number" class="form-control" value="<?= esc($detail['pembelian_id']); ?>" readonly>
            </div>
            <div class="col-md-3 mb-3">
                <label>Bahan ID</label>
                <input name="bahan_id" type="number" class="form-control" value="<?= esc($detail['bahan_id']); ?>">
            </div>
            <div class="col-md-2 mb-3">
                <label>Qty</label>
                <input name="qty" type="number" class="form-control" value="<?= esc($detail['qty']); ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Harga</label>
                <input name="harga" type="number" step="0.01" class="form-control" value="<?= esc($detail['harga']); ?>" required>
            </div>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="/admin/detail_pembelian" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>