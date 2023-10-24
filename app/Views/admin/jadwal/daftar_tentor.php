<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Jadwal Les
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Daftar Tentor
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= url_to('admin.jadwal.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Tentor</span>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="row align-middle">
        <?php foreach($tentor as $v): ?>
            <div class="col-12 col-md-6 col-xl-4">
                <a class="block block-link-pop block-link-shadow text-end" href="<?= url_to('JadwalController::detail_tentor',$v->id_pengajar) ?>">
                    <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                        <div class="text-start">
                            <div class="fw-semibold fs-5">
                                <?= $v->nama_pengajar ?>
                            </div>
                            <div class="fs-6" style="line-height: 1">
                                <?= $v->email_bimbel ?>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="fs-3 text-gray"><i class="fa fa-chalkboard-user"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>