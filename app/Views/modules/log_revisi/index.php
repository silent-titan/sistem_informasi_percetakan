<?= $this->extend('layout/main'); ?><?= $this->section('content'); ?>
<h3>Log Revisi</h3>
<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi</th>
                <th>User</th>
                <th>Catatan</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody><?php foreach ($items ?? [] as $lr): ?><tr>
                    <td><?= esc($lr['id']); ?></td>
                    <td><?= esc($lr['transaksi_id']); ?></td>
                    <td><?= esc($lr['user_id']); ?></td>
                    <td><?= esc($lr['catatan']); ?></td>
                    <td><?= esc($lr['created_at']); ?></td>
                </tr><?php endforeach; ?></tbody>
    </table><?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>