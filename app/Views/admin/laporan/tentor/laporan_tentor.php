<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_tanggal','ubah_nomor_hp', 'ubah_jam', 'hitung_durasi']) ?>

<?= $this->section('menu') ?>
Laporan
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Laporan Tentor
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .timeline-modern::before {
        background-color: rgba(54, 179, 160, 0.4);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12" id="cetak">
    <div class="row">
        <div class="col-12">
            <div class="block block-bordered">
                <div class="block-header bg-primary px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <a href="<?= url_to('admin.laporan.daftar_tentor') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
                        <span class="ms-3 me-auto text-white fs-5 fw-semibold">Laporan Pengajaran Tentor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fs-3 fw-semibold"><?= $tentor->nama_pengajar ?></div>
                        <div class="fs-6 fw-medium text-muted"><?= $tentor->email_bimbel ?></div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-chalkboard-user fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fs-3 fw-semibold"><?= ubah_nomor_hp($tentor->nomor_hp) ?></div>
                        <div class="fs-6 fw-medium text-muted"><?= $tentor->alamat == '' ? '<span>Tidak terdata</span>' : $tentor->alamat ?></div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-map-location fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <?php foreach($waktu as $k1=>$v1): ?>
            <?php foreach($v1 as $k2=>$v2): ?>
                <div class="col-12 col-lg-6">
                    <div class="block">
                        <div class="block-header block-header-default bg-<?= $v2['items'][0]->warna ?> text-white">
                            <h3 class="block-title fw-semibold">
                                Jenjang <?= $v2['items'][0]->nama_jenjang ?>
                                <?= $v2['items'][0]->jenis === '0' ?
                                    '<span class="ms-2 py-1 px-2 bg-white text-black">Reguler</span>' :
                                    '<span class="ms-2 py-1 px-2 bg-primary text-white">Privat</span>'
                                ?>
                            </h3>
                        </div>
                        <div class="block-content pb-4">
                            <div class="row">
                                <div class="col-5">
                                    <div class="fs-6 fw-medium text-muted">Tatap Muka</div>
                                    <div class="fs-3 fw-semibold"><?= count($v2['items']) ?> Kali</div>
                                </div>
                                <div class="col-7">
                                    <div class="fs-6 fw-medium text-muted">Total Waktu Mengajar</div>
                                    <div class="fs-3 fw-semibold"><?= $v2['durasi_jam'] . ' Jam ' . $v2['durasi_menit'] . ' Menit' ?></div>
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-12">
                                    <table class="table table-hover table-sm fs-sm">
                                        <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Kelas</th>
                                            <th>Total Waktu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($v2['items'] as $k3=>$v3): ?>
                                            <tr class="text-center">
                                                <th role="row"><?= $k3+1 ?></th>
                                                <td>
                                                    <?= ubah_tanggal($v3->tanggal) ?><br/>
                                                    <?= ubah_jam($v3->tanggal) . ' - ' . ubah_jam($v3->selesai) . ' WIB' ?>
                                                </td>
                                                <td><?= $v3->nama_kelas ?></td>
                                                <td><?= hitung_durasi($v3->tanggal, $v3->selesai) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/chart.js/chart.umd.js') ?>
<?= $this->endSection() ?>