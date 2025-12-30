<?php $role = session('role'); ?>
<div class="menu-header">Menu</div>
<?php if ($role === 'admin'): ?>
  <a href="/admin/dashboard">Dashboard</a>
  <a href="/admin/users">User</a>
  <a href="/admin/pelanggan">Pelanggan</a>
  <a href="/admin/layanan">Layanan</a>
  <a href="/admin/bahan">Bahan</a>
  <a href="/admin/supplier">Supplier</a>
  <a href="/admin/transaksi">Transaksi</a>
  <a href="/admin/pembayaran">Pembayaran</a>
  <a href="/admin/pembelian">Pembelian</a>
  <a href="/admin/detail-pesanan">Detail Pesanan</a>
  <a href="/admin/detail-pembelian">Detail Pembelian</a>
  <a href="/admin/log-revisi">Log Revisi</a>
<?php else: ?>
  <a href="/karyawan/dashboard">Dashboard</a>
  <a href="/karyawan/transaksi">Transaksi</a>
  <a href="/karyawan/pembayaran">Pembayaran</a>
  <a href="/karyawan/bahan">Bahan (lihat)</a>
<?php endif; ?>