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
            <h1 class="fs-4 fw-semibold mb-1">
                Selamat datang
            </h1>
            <h1 class="fs-3 fw-bold mb-3 text-primary">
                <?= view_cell('NamaAkunCell') ?>
            </h1>
            <h1 class="fs-6 fw-medium">
                Semoga harimu menyenangkan 😇
            </h1>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
