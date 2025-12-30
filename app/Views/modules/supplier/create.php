<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Tambah Supplier</h3>
<div class="card p-3">
    <form method="post" action="/admin/supplier">
        <?= csrf_field(); ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Supplier</label>
                <input name="nama" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Telepon</label>
                <input name="telepon" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="/admin/supplier" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>