<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']) ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Ubah Presensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('PresensiController::kehadiran_lihat_kelas', $kelas->id_kelas) ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Ubah Presensi</span>
        </div>
        <div class="block-content px-3 pt-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-6 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-lg">
                        <span class="badge bg-<?= $kelas->warna ?>"><?= $kelas->nama_jenjang ?></span>
                        <span class="badge bg-primary-op"><?= ($kelas->jenis == 0) ? 'Reguler' : 'Privat' ?></span>
                    </div>
                    <div class="fs-1">
                        <span class="fw-semibold">Kelas <?= $kelas->nama_kelas ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-content">
            <form action="<?= route_to('admin.presensi.kehadiran.ubah_presensi.post') ?>" method="post">
                <?= csrf_field() ?>
                <?= form_hidden('id_kelas', $kelas->id_kelas) ?>
                <?= form_hidden('id_pertemuan', $pertemuan->id_pertemuan) ?>
                <div class="row mb-4">
                    <div class="col-12 col-md-2">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="tatap_muka" name="tatap_muka" placeholder="" value="<?= $pertemuan->tatap_muka ?>" required>
                            <label class="form-label" for="tatap_muka">Tatap Muka Ke-</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="" value="<?= $pertemuan->tanggal ?>" required>
                            <label class="form-label" for="waktu">Tanggal dan Waktu</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="id_pengajar" name="id_pengajar" required>
                                <option value="" selected disabled>-- Pilih Tentor --</option>
                                <?php foreach ($pengajar as $p): ?>
                                    <option value="<?= $p->id_pengajar ?>" <?= $pertemuan->id_pengajar == $p->id_pengajar ? 'selected' : '' ?>><?= $p->nama_pengajar ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="form-label" for="id_pengajar">Tentor</label>
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
