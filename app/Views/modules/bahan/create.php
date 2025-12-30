<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<h3>Tambah Bahan</h3>
<div class="card p-3">
    <form method="post" action="/admin/bahan"><?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Nama</label><input name="nama" class="form-control" required></div>
            <div class="col-md-3 mb-3"><label class="form-label">Stok</label><input name="stok" type="number" class="form-control" value="0" required></div>
            <div class="col-md-3 mb-3"><label class="form-label">Satuan</label><input name="satuan" class="form-control"></div>
            <div class="col-md-4 mb-3"><label class="form-label">Harga Beli</label><input name="harga_beli" type="number" step="0.01" class="form-control" value="0"></div>
        </div><button class="btn btn-primary">Simpan</button> <a href="/admin/bahan" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>