<div class="sidebar pelanggan-sidebar">
  <div class="menu-header">Menu Pelanggan</div>
  <a href="/pelanggan/dashboard" class="<?= url_is('pelanggan/dashboard') ? 'active' : '' ?>">🏠 Dashboard</a>
  <a href="/pelanggan/layanan" class="<?= url_is('pelanggan/layanan*') ? 'active' : '' ?>">🛒 Layanan</a>
  <a href="/pelanggan/pesanan" class="<?= url_is('pelanggan/pesanan*') ? 'active' : '' ?>">📦 Pesanan Saya</a>
  <a href="/logout">🚪 Logout</a>
</div>
<div class="main">
  <?= $this->renderSection('content'); ?>
</div>