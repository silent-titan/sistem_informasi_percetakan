<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Pelanggan</h3>
    <a href="/admin/pelanggan/new" class="btn btn-primary">Tambah Pelanggan</a>
</div>

<div class="card p-3">
    <p><strong>Jumlah Pelanggan:</strong> <?= count($pelanggan ?? []); ?></p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pelanggan ?? [] as $p): ?>
            <tr>
                <td><?= esc($p['id']); ?></td>
                <td><?= esc($p['nama']); ?></td>
                <td><?= esc($p['email']); ?></td>
                <td><?= esc($p['telepon']); ?></td>
                <td><?= esc($p['alamat']); ?></td>
                <td>
                    <a href="/admin/pelanggan/<?= $p['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="/admin/pelanggan/<?= $p['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pelanggan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $pager->links(); ?>
</div>

<?= $this->endSection(); ?>