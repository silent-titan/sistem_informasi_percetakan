<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h3>Supplier</h3><a href="/admin/supplier/new" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody><?php foreach ($items ?? [] as $s): ?><tr>
                    <td><?= esc($s['id']); ?></td>
                    <td><?= esc($s['nama']); ?></td>
                    <td><?= esc($s['kontak']); ?></td>
                    <td><?= esc($s['alamat']); ?></td>
                    <td><a href="/admin/supplier/<?= $s['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="/admin/supplier/<?= $s['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus supplier ini?')">Hapus</button>
                        </form>
                    </td>
                </tr><?php endforeach; ?></tbody>
    </table><?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>