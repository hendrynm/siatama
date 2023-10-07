<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Tentor
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                Data Tentor
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
    </div>
    
    <div class="row align-middle">
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.tentor.tentor_aktif') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-primary">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Tentor Aktif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.tentor.tentor_nonaktif') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-danger">
                        <i class="fa fa-users-slash fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Tentor Nonaktif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.tentor.tambah_tentor') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-info">
                        <i class="fa fa-user-plus fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Tambah Tentor
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
