<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_tanggal', 'ubah_jam']) ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.presensi.kehadiran.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Kelas dan Tatap Muka</span>
        </div>
        <div class="block-content px-3 py-4 d-flex row justify-content-between">
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
            <div class="col-auto mt-3">
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-alt-primary text-center py-lg-3 px-lg-4" href="<?= url_to('PresensiController::kehadiran_tambah_presensi', $kelas->id_kelas) ?>">
                            <i class="fa fa-plus"></i>
                            <span class="fw-medium ms-2">Tambah Presensi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="block block-bordered">
        <div class="block-content p-0">
            <table class="table table-hover my-0">
                <thead>
                <tr class="bg-gray text-sm text-center">
                    <th class="col-2">Tatap Muka</th>
                    <th class="col-4">Jadwal</th>
                    <th class="col-4">Tentor</th>
                    <th class="col-2">Aksi</th>
                </tr>
                </thead>
                <tbody class="align-middle fs-sm">
                <?php foreach ($pertemuan as $p): ?>
                <tr>
                    <th class="text-center fs-1 fw-medium" scope="row">
                        <?= $p->tatap_muka ?>
                    </th>
                    <td class="fs-base">
                        <div class="fw-medium"><i class="far fa-calendar me-2"></i><?= ubah_tanggal($p->tanggal ) ?></div>
                        <div class=""><i class="far fa-clock me-2"></i>Pukul <?= ubah_jam($p->tanggal) ?> WIB</div>
                    </td>
                    <td class="fs-base">
                        <div class="fw-medium"><i class="far fa-user me-2"></i><?= $p->nama_pengajar ?></div>
                    </td>
                    <td class="text-center">
                        <div class="space-y-1">
                            <a href="<?= url_to('PresensiController::kehadiran_isi_presensi', $kelas->id_kelas, $p->id_pertemuan) ?>" class="btn btn-alt-primary btn-sm w-100"><i class="fa fa-eye me-2"></i>Presensi</a>
                            <a href="<?= url_to('PresensiController::kehadiran_ubah_presensi', $kelas->id_kelas, $p->id_pertemuan) ?>" class="btn btn-alt-warning btn-sm w-100"><i class="fa fa-edit me-2"></i>Ubah</a>
                            <a href="<?= url_to('PresensiController::kehadiran_hapus_presensi', $kelas->id_kelas, $p->id_pertemuan) ?>" class="btn btn-alt-danger btn-sm w-100"><i class="fa fa-trash me-2"></i>Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
