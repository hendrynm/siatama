<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_tanggal', 'ubah_jam']) ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Kelas
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
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
                <?php foreach ($pertemuan as $k=>$p): ?>
                <tr>
                    <th class="text-center fs-1 fw-medium" scope="row">
                        <?= $p->tatap_muka ?>
                    </th>
                    <td class="fs-base">
                        <div class="fw-medium"><i class="far fa-calendar me-2"></i><?= ubah_tanggal($p->tanggal ) ?></div>
                        <div class=""><i class="far fa-clock me-2"></i><?= ubah_jam($p->tanggal) ?> - <?= ubah_jam($p->selesai) ?> WIB</div>
                    </td>
                    <td class="fs-base">
                        <div class="fw-medium"><i class="far fa-user me-2"></i><?= $p->nama_pengajar ?></div>
                    </td>
                    <td class="text-center">
                        <div class="space-y-1">
                            <a href="<?= url_to('PresensiController::kehadiran_isi_presensi', $kelas->id_kelas, $p->id_pertemuan) ?>" class="btn btn-alt-primary btn-sm w-100"><i class="fa fa-eye me-2"></i>Lihat</a>
                            <?php if($cek_presensi->{$k} == true): ?>
                            <a href="<?= url_to('PresensiController::kehadiran_ubah_presensi', $kelas->id_kelas, $p->id_pertemuan) ?>" class="btn btn-alt-warning btn-sm w-100"><i class="fa fa-edit me-2"></i>Ubah</a>
                            <button class="btn btn-alt-danger btn-sm w-100" data-pertemuan-id="<?= $p->id_pertemuan ?>"><i class="fa fa-trash me-2"></i>Hapus</button>
                            <?php endif; ?>
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

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    !function() {
        class a {
            static sweetAlert2() {
                let e = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-alt-primary m-1",
                        cancelButton: "btn btn-alt-danger m-1",
                        input: "form-control"
                    }
                });
                <?php if (session()->getFlashdata('success')): ?>
                e.fire({
                    title: 'Berhasil!',
                    html: '<?= session()->getFlashdata("success") ?>',
                    icon: 'success'
                });
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('error')): ?>
                e.fire({
                    title: 'Kesalahan Aplikasi!',
                    html: '<?= session()->getFlashdata("error") ?>',
                    icon: 'error'
                });
                <?php endif; ?>
            }
            static konfirmasiHapus() {
                $('button[data-pertemuan-id]').click(function () {
                    const id_pertemuan = $(this).data('pertemuan-id');
                    
                    let e = Swal.mixin({
                        buttonsStyling: !1,
                        target: "#page-container",
                        customClass: {
                            confirmButton: "btn btn-alt-danger m-1",
                            cancelButton: "btn btn-alt-secondary m-1",
                            input: "form-control",
                            icon: "border-0"
                        }
                    });
                    e.fire({
                        title: 'Konfirmasi Hapus',
                        html: 'Apakah Anda yakin ingin menghapus pertemuan ini?',
                        iconHtml: '<i class="fa fa-trash text-danger"></i>',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengirim permintaan AJAX POST untuk menghapus data
                            $.ajax({
                                url: '<?= url_to('PresensiController::kehadiran_hapus_presensi') ?>',
                                type: 'POST',
                                data: {
                                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
                                    id_pertemuan: id_pertemuan
                                },
                                success: function (response) {
                                    if (response === 'sukses') {
                                        e.fire('Berhasil!', 'Pertemuan berhasil dihapus!', 'success').then(() => window.location.reload());
                                    } else {
                                        e.fire('Kesalahan Program!', response, 'error')
                                    }
                                },
                                error: function () {
                                    e.fire('Server Error!', 'Terjadi kegagalan proses di sisi Server!. Coba beberapa saat lagi', 'error');
                                },
                            });
                        }
                    });
                });
            }
            static init() {
                this.sweetAlert2();
                this.konfirmasiHapus();
            }
        }
        Codebase.onLoad((() => a.init()))
    }();
</script>
<?= $this->endSection() ?>
