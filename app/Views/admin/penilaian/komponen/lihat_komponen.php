<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Penilaian
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Lihat Komponen
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.penilaian.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Komponen Penilaian</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.pengaturan.tambah_kelas') ?>" method="post">
                <div class="row mb-4">
                    <label class="form-label fs-lg mb-n2 mb-md-3">Komponen Penilaian #1</label>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nama Komponen Penilaian</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="mentor_1" name="mentor_1" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Objektif (berdasarkan angka/skor)</option>
                                <option value="2">Subjektif (berdasarkan perspektif mentor)</option>
                            </select>
                            <label class="form-label" for="mentor_1">Jenis Nilai</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 1</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 2</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 3</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 4</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 5</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Skala 6</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="form-label fs-lg mt-4 mb-n2 mb-md-3">Komponen Penilaian #2</label>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nama Komponen Penilaian</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="mentor_1" name="mentor_1" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Objektif (berdasarkan angka/skor)</option>
                                <option value="2">Subjektif (berdasarkan perspektif mentor)</option>
                            </select>
                            <label class="form-label" for="mentor_1">Jenis Nilai</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Terendah</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="waktu_mulai_1" name="waktu_mulai_1" placeholder="" required>
                            <label class="form-label" for="waktu_mulai_1">Nilai Tertinggi</label>
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
