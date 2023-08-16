<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.presensi.pengaturan.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Kelas Baru</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.pengaturan.tambah_kelas') ?>" method="post">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-floating">
                            <select class="form-select" id="jenjang" name="jenjang" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">SD</option>
                                <option value="2">SMP</option>
                                <option value="3">SMA</option>
                            </select>
                            <label class="form-label" for="jenjang">Jenjang</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="tingkat" name="tingkat" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                            </select>
                            <label class="form-label" for="tingkat">Kelas</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="jenis_jadwal" name="jenis_jadwal" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Tidak Terjadwal</option>
                                <option value="2">1x Seminggu</option>
                                <option value="3">2x Seminggu</option>
                                <option value="4">3x Seminggu</option>
                                <option value="5">5x Seminggu</option>
                                <option value="6">Setiap Hari</option>
                            </select>
                            <label class="form-label" for="jenis_jadwal">Jenis Kelas</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="form-label fs-lg mt-5 mb-n2 mb-md-3">Jadwal Les #1</label>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="tanggal_1" name="tanggal_1" placeholder="" required>
                            <label class="form-label" for="tanggal_1">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="time" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Waktu Mulai</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="time" class="form-control" id="waktu_selesai_1" name="waktu_selesai_1" placeholder="" required>
                            <label class="form-label" for="waktu_selesai_1">Waktu Selesai</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="mentor_1" name="mentor_1" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Hendry Naufal Marbella</option>
                                <option value="2">Ening Tri Ayu</option>
                                <option value="3">Brahmantyo Aditya</option>
                            </select>
                            <label class="form-label" for="mentor_1">Mentor</label>
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
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
