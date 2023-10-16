<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']) ?>

<?= $this->section('menu') ?>
Laporan
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Lihat Tentor
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<style>
    .custom-btn-circle {
        width: 5vh;
        height: 5vh;
        border-radius: 2.5vh;
        font-size: 14px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('admin.laporan.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Tentor</span>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="row align-middle">
        <?php foreach($tentor as $v): ?>
            <div class="col-12 col-md-6 col-xl-4">
                <a class="block block-link-pop block-link-shadow text-end" href="<?= url_to('LaporanController::laporan_tentor',$v->id_pengajar) ?>">
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