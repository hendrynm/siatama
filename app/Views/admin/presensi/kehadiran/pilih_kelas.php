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
        <?php foreach($kelas as $k): ?>
        <div class="col-12 col-md-6 col-xl-3">
            <a class="block block-link-pop block-link-shadow text-end" href="<?= url_to('PresensiController::kehadiran_lihat_kelas',$k->id_kelas) ?>">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-1" style="line-height: 1">
                            <?= $k->nama_kelas ?>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-<?= $k->warna ?>"><?= $k->nama_jenjang ?></div>
                        <div class="fw-semibold text-primary"><?= ($k->jenis == 0) ? 'Reguler' : '<span class="bg-primary text-white px-1">Privat</span>' ?></div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
