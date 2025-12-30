<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<h3>Daftar Layanan</h3>
<a href="/admin/layanan/create" class="btn btn-primary mb-3">Tambah Layanan</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(empty($layanan)): ?>
            <tr><td colspan="6" class="text-center">Belum ada layanan</td></tr>
        <?php else: ?>
            <?php foreach($layanan as $l): ?>
                <tr>
                    <td><?= $l['id']; ?></td>
                    <td><?= $l['nama']; ?></td>
                    <td><?= $l['deskripsi']; ?></td>
                    <td>Rp <?= number_format($l['harga'],0,',','.'); ?></td>
                    <td><?= $l['satuan']; ?></td>
                    <td>
                        <a href="/admin/layanan/edit/<?= $l['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/admin/layanan/<?= $l['id']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>