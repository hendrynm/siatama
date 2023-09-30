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
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= route_to('admin.penilaian.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Komponen Penilaian</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.pengaturan.tambah_kelas') ?>" method="post">
                <?php foreach($nilai as $k=>$n): ?>
                <div class="row mt-3 mb-5">
                    <label class="form-label fs-lg mb-n2 mb-md-3">Komponen Penilaian <?= ($k+1) ?></label>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_komponen[]" name="nama_komponen[]" placeholder="" value="<?= $n->nama_nilai ?>" required>
                            <label class="form-label" for="nama_komponen[]">Nama Komponen Penilaian</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="jenis[]" name="jenis[]" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1" <?= ($n->jenis == 1) ? 'selected' : '' ?>>Objektif (berdasarkan angka/skor)</option>
                                <option value="0" <?= ($n->jenis == 0) ? 'selected' : '' ?>>Subjektif (berdasarkan perspektif mentor)</option>
                            </select>
                            <label class="form-label" for="jenis[]">Jenis Nilai</label>
                        </div>
                    </div>
                    <?php foreach ($skor->{$n->id_nilai} as $i=>$s): ?>
                    <div class="col-6 col-md-2 mt-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="skor[]" name="skor[]" placeholder="" value="<?= $s->skor ?>" required>
                            <label class="form-label" for="skor[]">Nilai Skala <?= ($i+1) ?></label>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <?php endforeach; ?>
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
