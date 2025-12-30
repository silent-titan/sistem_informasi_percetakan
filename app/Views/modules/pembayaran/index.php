<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Pembayaran</h3>
    <a href="/admin/pembayaran/new" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi</th>
                <th>Tanggal</th>
                <th>Metode</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pembayaran)): ?>
                <?php foreach ($pembayaran as $p): ?>
                <tr>
                    <td><?= esc($p['id']); ?></td>
                    <td><?= esc($p['transaksi_id']); ?></td>
                    <td><?= esc($p['tanggal']); ?></td>
                    <td><?= esc($p['metode']); ?></td>
                    <td><?= esc($p['nominal']); ?></td>
                    <td><?= esc($p['keterangan']); ?></td>
                    <td>
                        <a href="/admin/pembayaran/<?= $p['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="/admin/pembayaran/<?= $p['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Belum ada data pembayaran</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>