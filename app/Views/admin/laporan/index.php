<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Laporan
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                Laporan
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
    </div>

    <div class="row align-middle">
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.laporan.pilih_kelas') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-primary">
                        <i class="fa fa-book-open fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Lihat Laporan
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>