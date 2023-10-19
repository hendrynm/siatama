<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_harga', 'ubah_bulan', 'ubah_tanggal']); ?>

<?= $this->section('menu') ?>
Pembayaran
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Pembayaran
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>

<style>
    .dataTables_filter {
        display: none;
    }
    .dtsp-clearAll, .dtsp-showAll, .dtsp-collapseAll {
        font-size: 0.8rem;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.pembayaran.daftar_bayar') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Pembayaran Bimbel</span>
        </div>
        <div class="block-content px-3 py-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-9 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-lg">
                        <span class="badge bg-<?= $siswa->warna ?>">
                            <?= $siswa->nama_jenjang ?> -
                            <?= $siswa->nama_tingkat ?>
                        </span>
                        <span class="badge bg-primary-op">
                            <?= ($siswa->jenis == 0) ? 'Reguler' : 'Privat' ?> -
                            <?= $siswa->nama_paket ?> -
                            <?= ubah_harga($siswa->harga_paket) ?><?= $siswa->jenis === '0' ? '/bulan' : '/pertemuan' ?>
                        </span>
                    </div>
                    <div class="">
                        <div class="fs-2 fw-semibold"><?= $siswa->nama_siswa ?></div>
                        <div class="fs-5 fw-medium"><?= $siswa->asal_sekolah ?></div>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-alt-info text-center px-lg-4 py-lg-3" data-bs-toggle="modal" data-bs-target="#modal-tambah-pembayaran">
                            <i class="fa fa-plus"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Data</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row">
        <?php foreach($bayar as $k=>$v): ?>
        <div class="col-12 col-lg-6">
            <div class="block">
                <div class="block-header block-header-default bg-<?= $v['status'] === 'Lunas' ? 'success' : 'danger' ?>">
                    <h3 class="block-title fw-semibold text-white">
                        Periode <span class="fw-bold"><?= ubah_bulan($v['periode']) ?></span>
                    </h3>
                </div>
                <div class="block-content pb-4">
                    <div class="row">
                        <div class="col-6 col-lg-4">
                            <div class="fs-6 fw-medium text-muted">Tagihan</div>
                            <div class="fs-3 fw-semibold"><?= ubah_harga($v['harga']) ?></div>
                        </div>
                        <div class="col-6 col-lg-4">
                            <div class="fs-6 fw-medium text-muted">Sudah Dibayar</div>
                            <div class="fs-3 fw-semibold"><?= ubah_harga($v['total']) ?></div>
                        </div>
                        <div class="col-6 col-lg-4 mt-3 mt-lg-0">
                            <div class="fs-6 fw-medium text-muted">Status</div>
                            <div class="fs-3 fw-semibold text-<?= $v['status'] === 'Lunas' ? 'success' : 'danger' ?>"><?= $v['status'] ?></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <table class="table table-hover table-sm fs-sm">
                                <thead>
                                <tr class="text-center">
                                    <th class="col-4">Tanggal Bayar</th>
                                    <th class="col-3">Nominal</th>
                                    <th class="col-4">Catatan</th>
                                    <th class="col-1">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($v['detail']) === 0): ?>
                                <tr>
                                    <td colspan="4" class="text-center fst-italic">Tidak ada data</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach($v['detail'] as $k1=>$v1): ?>
                                <tr class="align-middle text-center">
                                    <td class=""><?= ubah_tanggal($v1->tanggal) ?></td>
                                    <td class=""><?= ubah_harga($v1->nominal) ?></td>
                                    <td><?= $v1->catatan ?? '-' ?></td>
                                    <td class="">
                                        <button class="btn btn-sm btn-alt-danger tombol-hapus-pembayaran" data-id-pembayaran="<?= $v1->id_pembayaran ?>" data-tanggal="<?= ubah_tanggal($v1->tanggal) ?>" data-nominal="<?= ubah_harga($v1->nominal) ?>">
                                            <i class="fa fa-trash fa-sm"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="modal fade" id="modal-tambah-pembayaran" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-pembayaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Pembayaran Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="form-floating mb-4">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="">
                        <label class="form-label" for="tanggal">Tanggal Bayar</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="nominal" name="nominal" placeholder="">
                        <label class="form-label" for="nominal">Nominal</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="">
                        <label class="form-label" for="catatan">Catatan</label>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm tombol-simpan-pembayaran" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    $(document).ready(function () {
        let sa = Swal.mixin({
            buttonsStyling: !1,
            target: "#page-container",
            customClass: {
                confirmButton: "btn btn-alt-primary m-1",
                cancelButton: "btn btn-alt-danger m-1",
                input: "form-control"
            }
        });
        
        $('.tombol-simpan-pembayaran').on('click', function () {
            let id_siswa = <?= $siswa->id_siswa ?>;
            let tanggal = $('#tanggal').val();
            let nominal = $('#nominal').val();
            let catatan = $('#catatan').val();

            $.ajax({
                url: "<?= route_to('admin.pembayaran.simpan_bayar') ?>",
                type: "POST",
                data: {
                    <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                    id_siswa: id_siswa,
                    tanggal: tanggal,
                    nominal: nominal,
                    catatan: catatan
                },
                success: function (response) {
                    sa.fire({
                        title: 'Berhasil',
                        text: 'Data pembayaran berhasil disimpan',
                        icon: 'success',
                    }).then(function (){
                        window.location.reload();
                    });
                },
                error: function (response) {
                    sa.fire({
                        title: 'Gagal',
                        html: 'Data pembayaran gagal disimpan<br/>' + response.responseText,
                        icon: 'error',
                    }).then(function (){
                        window.location.reload();
                    });
                }
            });
        });
        
        
        
        $('.tombol-hapus-pembayaran').on('click', function () {
            let id_pembayaran = $(this).data('id-pembayaran');
            let tanggal = $(this).data('tanggal');
            let nominal = $(this).data('nominal');

            sa.fire({
                title: 'Konfirmasi',
                html: '<div class="text-center">Apakah anda yakin ingin menghapus pembayaran <span class="fw-bold">' + tanggal + '</span> sebesar <span class="fw-bold">' + nominal + '</span>?</div>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= route_to('admin.pembayaran.hapus_bayar') ?>",
                        type: "POST",
                        data: {
                            <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                            id_pembayaran: id_pembayaran
                        },
                        success: function (response) {
                            sa.fire({
                                title: 'Berhasil',
                                text: 'Data pembayaran berhasil dihapus',
                                icon: 'success',
                            }).then(function (){
                                window.location.reload();
                            });
                        },
                        error: function (response) {
                            sa.fire({
                                title: 'Gagal',
                                html: 'Data pembayaran gagal dihapus<br/>' + response.responseText,
                                icon: 'error',
                            }).then(function (){
                                window.location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>