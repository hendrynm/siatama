<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Presensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Presensi</span>
        </div>
        <div class="block-content px-3 pt-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-6 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-base">
                        <span class="badge bg-info">SMP</span>
                        <span class="badge bg-primary-op">Kelas 7</span>
                    </div>
                    <div class="fs-lg">
                        <span class="fw-semibold">Reguler Kelas 20</span>
                    </div>
                </div>
                <div class="fs-sm row space-y-1">
                    <div class="col-12 col-md-6 col-lg-12 col-xxl-6 row">
                        <div class="col-5">
                            <i class="far fa-calendar text-primary"></i><span class="ms-2">Senin</span>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-clock text-primary"></i><span class="ms-2">16:00 - 18:00</span>
                        </div>
                    </div>
                </div>
                <div class="fs-sm d-flex flex-column">
                    <div class="fw-medium">Tentor:</div>
                    <div class="">Hendry Naufal Marbella</div>
                </div>
            </div>
        </div>
        
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>" method="post">
                <div class="row mb-4">
                    <div class="col-12 col-md-2">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="tatap_muka" name="tatap_muka" placeholder="" value="4" required>
                            <label class="form-label" for="tatap_muka">Tatap Muka Ke-</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" placeholder="" required>
                            <label class="form-label" for="waktu">Tanggal dan Waktu</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="mentor" name="mentor" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Hendry Naufal Marbella</option>
                                <option value="2">Ening Tri Ayu</option>
                                <option value="3">Brahmantyo Aditya</option>
                            </select>
                            <label class="form-label" for="mentor">Tentor</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-2 ms-auto">
                        <button class="btn btn-info w-100 p-2">
                            <i class="fa fa-save me-2"></i>
                            Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Floating Labels Contact -->
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
