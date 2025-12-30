<div class="d-flex justify-content-between align-items-center p-2 border-bottom bg-white">
  <div class="fw-bold text-primary">
    Sistem Informasi Percetakan
  </div>
  <div class="d-flex align-items-center">
    <span class="me-3">
      <?= esc(session('nama')); ?> (<?= esc(session('role')); ?>)
    </span>
    <a href="/logout" class="btn btn-sm btn-outline-primary">Keluar</a>
  </div>
</div>