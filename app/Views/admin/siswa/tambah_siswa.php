<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Siswa
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.siswa.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Siswa Baru</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.siswa.tambah_siswa') ?>" method="post">
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="">
                            <label class="form-label" for="nama_siswa">Nama Lengkap Siswa</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="">
                            <label class="form-label" for="sekolah">Asal Sekolah</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="">
                            <label class="form-label" for="nama_ortu">Nama Orang Tua</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="hp_ortu" name="hp_ortu" placeholder="">
                            <label class="form-label" for="hp_ortu">Nomor HP orang Tua</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
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
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="kelas" name="kelas" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="0">Kelas 00 | Jadwal Tidak Menentu</option>
                                <option value="1">Kelas 01 | Senin 15.00-17.00</option>
                                <option value="2">Kelas 02 | Selasa 15.00-17.00</option>
                                <option value="3">Kelas 03 | Rabu + Jumat 15.00-17.00</option>
                            </select>
                            <label class="form-label" for="kelas">Kelas Bimbel</label>
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
