<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Pilih Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                <a href="<?= route_to('admin.presensi.index') ?>" class="fa fa-arrow-circle-left fa-1x pe-2"></a>
                <span class="">Kelas Bimbel</span>
            </div>
            <div class="fs-5">
                Silakan memilih kelas di bawah ini
            </div>
        </div>
    </div>
    
    <div class="row align-middle">
        <div class="col-12 col-md-6 col-xl-3">
            <a class="block block-link-pop block-link-shadow text-end" href="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-1" style="line-height: 1">
                            10
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-danger">SD</div>
                        <div class="fw-semibold text-primary">Kelas 6</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <a class="block block-link-pop block-link-shadow text-end" href="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-1" style="line-height: 1">
                            20
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-info">SMP</div>
                        <div class="fw-semibold text-primary">Kelas 8</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <a class="block block-link-pop block-link-shadow text-end" href="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-1" style="line-height: 1">
                            30
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-secondary">SMA</div>
                        <div class="fw-semibold text-primary">Kelas 12</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
