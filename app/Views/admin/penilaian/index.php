<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Penilaian
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                Penilaian Siswa
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
    </div>
    
    <div class="row align-middle">
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.penilaian.pilih_kelas') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-primary">
                        <i class="fa fa-pen-alt fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Isi Penilaian
                    </div>
                </div>
            </a>
        </div>
        <?php if(session()->get('hak_akses') == 'Admin'): ?>
        <div class="col-6 col-xl-3">
            <a class="block block-link-pop text-center" href="<?= route_to('admin.penilaian.lihat_komponen') ?>">
                <div class="block-content py-4 py-xl-5">
                    <div class="fs-1 text-info">
                        <i class="fa fa-file-circle-check fa-2x"></i>
                    </div>
                    <div class="fw-medium fs-3 mt-3">
                        Komponen Nilai
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
