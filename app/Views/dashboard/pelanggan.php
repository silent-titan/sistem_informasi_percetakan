<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #0d6efd 0%, #4dabf7 50%, #ffffff 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            color: #212529 !important;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card-header {
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
        }

        h3 {
            color: #0d6efd;
            font-weight: bold;
        }

        .table thead {
            background: #0d6efd;
            color: #fff;
        }
        .table-hover tbody tr:hover {
            background-color: #e9f2ff;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background: #0b5ed7;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Menu Pelanggan</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/pelanggan/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/pelanggan/layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="/pelanggan/pesanan">Pesanan Saya</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <h3 class="mb-4">Dashboard Pelanggan</h3>
    <div class="card mb-4">
        <div class="card-header">Buat Pembelian</div>
        <div class="card-body">
            <form action="/pelanggan/dashboard/beli" method="post">
               <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="layanan_id" class="form-label">Layanan</label>
                    <select name="layanan_id" id="layanan_id" class="form-select" required>
                        <?php foreach($layananList as $l): ?>
                            <option value="<?= $l['id']; ?>">
                                <?= $l['nama']; ?> (Rp <?= number_format($l['harga'],0,',','.'); ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Beli</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Riwayat Pembelian</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Layanan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($riwayat)): ?>
                        <tr><td colspan="4" class="text-center">Belum ada pembelian</td></tr>
                    <?php else: ?>
                        <?php foreach($riwayat as $r): ?>
                            <tr>
                                <td><?= $r['kode']; ?></td>
                                <td><?= $r['tanggal']; ?></td>
                                <td><?= $r['layanan_nama']; ?></td>
                                <td><?= $r['total']; ?></td>
                                <td>
                                    <span class="badge 
                                        <?= $r['status'] === 'menunggu konfirmasi' ? 'bg-warning text-dark' : 'bg-success'; ?>">
                                        <?= ucfirst($r['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>