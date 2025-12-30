<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Detail Pesanan</h3>
    <a href="/admin/detail_pesanan/new" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi</th>
                <th>Layanan</th>
                <th>Bahan</th>
                <th>Deskripsi</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $d): ?>
                <tr>
                    <td><?= esc($d['id']); ?></td>
                    <td><?= esc($d['transaksi_id']); ?></td>
                    <td><?= esc($d['layanan_id']); ?></td>
                    <td><?= esc($d['bahan_id']); ?></td>
                    <td><?= esc($d['deskripsi']); ?></td>
                    <td><?= esc($d['qty']); ?></td>
                    <td><?= number_format($d['harga'], 2); ?></td>
                    <td><?= number_format($d['subtotal'], 2); ?></td>
                    <td>
                        <a href="/admin/detail_pesanan/<?= $d['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="/admin/detail_pesanan/<?= $d['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus detail ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="9" class="text-center">Belum ada detail pesanan</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>