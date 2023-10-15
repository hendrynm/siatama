<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_nomor_hp', 'ubah_harga']); ?>

<?= $this->section('menu') ?>
Harga Paket
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Daftar Paket
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') ?>
<?= link_tag('src/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') ?>
<?= link_tag('src/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') ?>
<?= link_tag('https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.bootstrap5.min.css') ?>
<?= link_tag('https://cdn.datatables.net/select/1.3.3/css/select.bootstrap5.min.css') ?>
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
            <a href="<?= route_to('admin.paket.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Paket</span>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datasiswa">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-auto">No.</th>
                        <th class="col-4" style="min-width: 150px;">Nama Paket</th>
                        <th class="col-4">Tingkat</th>
                        <th class="col-3">Harga</th>
                        <th class="col-auto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php foreach ($paket as $k=>$v): ?>
                        <tr>
                            <th class="text-center fw-medium fs-lg" scope="row">
                                <?= $k+1 ?>
                            </th>
                            <td class="">
                                <?= ($v->jenis) == 0 ? 'Reguler' : 'Privat' ?> - <span class="fw-medium"><?= $v->nama_paket ?></span>
                            </td>
                            <td class="">
                                <?= $v->nama_tingkat ?>
                            </td>
                            <td class="">
                                <?= ubah_harga($v->harga_paket) ?><?= ($v->jenis) == 0 ? '/bulan' : '/pertemuan' ?>
                            </td>
                            <td class="text-center space-y-1">
                                <a href="<?= url_to('PaketController::ubah_paket', $v->id_paket) ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Ubah">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <button class="btn btn-sm btn-alt-danger" data-paket-hapus="<?= $v->id_paket ?>" data-nama-paket="<?= $v->nama_tingkat . ' - ' . $v->nama_paket ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/datatables/jquery.dataTables.min.js') ?>
<?= script_tag('src/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') ?>
<?= script_tag('https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js') ?>
<?= script_tag('https://cdn.datatables.net/searchpanes/2.2.0/js/searchPanes.bootstrap5.min.js') ?>
<?= script_tag('https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    !function() {
        class a {
            static initDataTables() {
                jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                    sWrapper: "dataTables_wrapper dt-bootstrap5",
                    sLengthSelect: "form-select form-select-sm",
                });
                jQuery.extend(!0, jQuery.fn.dataTable.defaults, {
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
                    }
                });

                const table = jQuery(".datatable-datasiswa").DataTable({
                    searchPanes: {
                        threshold: 1,
                        initCollapsed: true,
                        orderable: false,
                        cascadePanes: true,
                        viewTotal: true,
                        columns: [1, 2, 3]
                    },
                    dom: 'Plfrtip',
                    pageLength: 5,
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "Semua"]
                    ],
                });
            }
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
                $('button[data-nama-paket]').click(function () {
                    const id_paket = $(this).data('paket-hapus');
                    const nama_paket = $(this).data('nama-paket');
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
                        html: 'Apakah Anda yakin ingin menghapus data<br><span class="text-danger fw-bold fs-lg">' + nama_paket + '</span>',
                        iconHtml: '<i class="fa fa-trash text-danger"></i>',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengirim permintaan AJAX POST untuk menghapus data
                            $.ajax({
                                url: '<?= url_to('admin.paket.hapus_paket') ?>', // Ganti dengan URL tindakan penghapusan Anda
                                type: 'POST',
                                data: { id_paket: id_paket, '<?= csrf_token() ?>': '<?= csrf_hash() ?>' },
                                success: function (response) {
                                    if (response === 'sukses') {
                                        e.fire('Berhasil!', 'Data paket berhasil dihapus!', 'success').then(() => window.location.reload());
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
                this.initDataTables();
                this.sweetAlert2();
                this.konfirmasiHapus();
            }
        }
        Codebase.onLoad((() => a.init()))
    }();
</script>

<?= $this->endSection() ?>
