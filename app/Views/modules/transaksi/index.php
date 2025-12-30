<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Transaksi</h3>
    <a href="<?= (session('role')==='admin') ? '/admin/transaksi/new' : '/karyawan/transaksi/new'; ?>" class="btn btn-primary">Tambah</a>
</div>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Pelanggan</th>
                <th>Karyawan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items ?? [] as $t): ?>
            <tr>
                <td><?= esc($t['id']); ?></td>
                <td><?= esc($t['kode']); ?></td>
                <td><?= esc($t['pelanggan_id']); ?></td>
                <td><?= esc($t['tanggal']); ?></td>
                <td><?= esc($t['status']); ?></td>
                <td><?= number_format($t['total'], 2); ?></td>
                <td><?= esc($t['catatan']); ?></td>
                <td>
                    <a href="<?= (session('role')==='admin') ? '/admin/transaksi/'.$t['id'].'/edit' : '/karyawan/transaksi/'.$t['id'].'/edit'; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="<?= (session('role')==='admin') ? '/admin/transaksi/'.$t['id'] : '/karyawan/transaksi/'.$t['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>