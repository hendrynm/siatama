<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Tentor
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tentor Nonaktif
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
        <div class="block-header bg-danger px-4 d-flex">
            <a href="<?= route_to('admin.tentor.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Tentor Nonaktif</span>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datatentor">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-auto">No.</th>
                        <th class="col-4" style="min-width: 100px;">Nama Lengkap</th>
                        <th class="col-3" style="min-width: 100px;">Kontak</th>
                        <th class="col-4" style="min-width: 100px;">Alamat</th>
                        <th class="col-auto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php foreach ($tentor as $k=>$v): ?>
                        <tr>
                            <th class="text-center fw-medium fs-lg" scope="row">
                                <?= $k+1 ?>
                            </th>
                            <td class="">
                                <div class="fw-semibold"><?= $v->nama_pengajar ?></div>
                                <div class="fs-sm"><?= $v->email_bimbel ?></div>
                            </td>
                            <td class="">
                                <div class="fw-semibold"><?= $v->nomor_hp ?></div>
                                <div class="fs-sm"><?= $v->email_pribadi ?></div>
                            </td>
                            <td class="fs-sm">
                                <?= $v->alamat ?>
                            </td>
                            <td class="text-center space-y-1">
                                <button class="btn btn-sm btn-alt-info" data-tentor-aktif-id="<?= $v->id_history_pengajar ?>" data-tentor-aktif-nama="<?= $v->nama_pengajar ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Aktifkan">
                                    <i class="fa fa-box-open"></i>
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

                const table = jQuery(".datatable-datatentor").DataTable({
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
                    title: 'Berhasil!',
                    html: '<?= session()->getFlashdata("error") ?>',
                    icon: 'error'
                });
                <?php endif; ?>
            }
            static konfirmasiAktif() {
                $('button[data-tentor-aktif-id]').click(function () {
                    const tentorId = $(this).data('tentor-aktif-id');
                    const tentorNama = $(this).data('tentor-aktif-nama');
                    let e = Swal.mixin({
                        buttonsStyling: !1,
                        target: "#page-container",
                        customClass: {
                            confirmButton: "btn btn-alt-info m-1",
                            cancelButton: "btn btn-alt-secondary m-1",
                            input: "form-control",
                            icon: "border-0"
                        }
                    });
                    e.fire({
                        title: 'Konfirmasi Aktivasi',
                        html: 'Apakah Anda yakin ingin mengaktifkan data<br><span class="text-info fw-bold fs-lg">' + tentorNama + '</span>',
                        iconHtml: '<i class="fa fa-box-open text-info"></i>',
                        showCancelButton: true,
                        confirmButtonText: 'Aktifkan',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengirim permintaan AJAX POST untuk menghapus data
                            $.ajax({
                                url: '<?= url_to('TentorController::aktif_tentor') ?>', // Ganti dengan URL tindakan penghapusan Anda
                                type: 'POST',
                                data: { id_tentor: tentorId, '<?= csrf_token() ?>': '<?= csrf_hash() ?>' },
                                success: function (response) {
                                    if (response === 'sukses') {
                                        e.fire('Berhasil!', 'Data tentor berhasil diaktifkan!', 'success').then(() => window.location.reload());
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
                this.konfirmasiAktif();
            }
        }
        Codebase.onLoad((() => a.init()))
    }();
</script>

<?= $this->endSection() ?>
