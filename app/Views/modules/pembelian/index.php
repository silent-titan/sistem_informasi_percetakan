<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Pembelian</h3>
    <a href="/admin/pembelian/new" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Supplier</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $pb): ?>
                <tr>
                    <td><?= esc($pb['kode']); ?></td>
                    <td><?= esc($pb['supplier_id']); ?></td>
                    <td><?= esc($pb['tanggal']); ?></td>
                    <td><?= number_format($pb['total'], 2); ?></td>
                    <td><?= esc($pb['catatan']); ?></td>
                    <td>
                        <a href="/admin/pembelian/<?= $pb['id']; ?>/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="/admin/pembelian/<?= $pb['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pembelian ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">Belum ada data pembelian</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>