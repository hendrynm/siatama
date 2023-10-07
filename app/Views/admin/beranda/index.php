<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Selamat Datang
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <div class="fs-3 fw-semibold mb-1">
                Selamat datang
            </div>
            <div class="fs-1 fw-bold mb-3 text-primary" style="line-height: 1">
                <?= view_cell('NamaAkunCell') ?>
            </div>
            <span class="fs-4">
                Semoga harimu menyenangkan 😇
            </span>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
