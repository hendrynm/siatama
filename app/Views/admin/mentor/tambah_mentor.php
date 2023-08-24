<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Mentor
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Mentor
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.mentor.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Mentor Baru</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.mentor.tambah_mentor') ?>" method="post">
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_mentor" name="nama_mentor" placeholder="">
                            <label class="form-label" for="nama_mentor">Nama Lengkap Mentor</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kontak" name="kontak" placeholder="">
                            <label class="form-label" for="kontak">Nomor HP / Kontak</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6 col-lg-2 ms-auto">
                        <button type="submit" class="btn btn-info w-100">
                            <i class="fa fa-save me-2"></i> Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
