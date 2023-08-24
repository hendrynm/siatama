<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Siswa
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Siswa Aktif
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') ?>
<?= link_tag('src/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') ?>
<?= link_tag('src/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') ?>
<?= link_tag('https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.bootstrap5.min.css') ?>
<?= link_tag('https://cdn.datatables.net/select/1.3.3/css/select.bootstrap5.min.css') ?>

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
            <a href="<?= route_to('admin.siswa.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Siswa Aktif</span>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datasiswa">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-auto">No.</th>
                        <th class="col-4" style="min-width: 150px;">Nama Lengkap</th>
                        <th class="col-4" style="min-width: 150px;">Orang Tua</th>
                        <th class="col-3">Informasi</th>
                        <th class="col-auto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            1
                        </th>
                        <td class="">
                            <div class="fw-medium">Brian Aprilio Pramono Putra</div>
                            <div class="fs-sm">
                                SDN Dr. Soetomo 1 Surabaya
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-danger">SD/MI</span>
                                <span class="badge bg-primary">Kelas 5</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Rendi Prabowo Budianto</div>
                            <div class="fs-sm">
                                081234567890
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Kelas Bimbel: 20</div>
                            <div class="fs-sm">Mentor: Ening Tri Ayu</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.siswa.ubah_siswa') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.hapus_siswa') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.arsip_siswa') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            2
                        </th>
                        <td class="">
                            <div class="fw-medium">Bena Bianda Putri Cantikka</div>
                            <div class="fs-sm">
                                SMPN 1 Surabaya
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-info">SMP/MTs</span>
                                <span class="badge bg-primary">Kelas 8</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Djuminten Sekarningrum</div>
                            <div class="fs-sm">
                                081234567890
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Kelas Bimbel: 03</div>
                            <div class="fs-sm">Mentor: Hendry Naufal Marbella</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.siswa.ubah_siswa') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.hapus_siswa') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.arsip_siswa') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            3
                        </th>
                        <td class="">
                            <div class="fw-medium">Anang Dwi Saputro</div>
                            <div class="fs-sm">
                                SMAK Santa Maria 2 Surabaya
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-secondary">SMA/MA</span>
                                <span class="badge bg-primary">Kelas 12</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Suroso Adi Pratomo</div>
                            <div class="fs-sm">
                                081234567890
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Kelas Bimbel: 13</div>
                            <div class="fs-sm">Mentor: Ening Tri Ayu</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.siswa.ubah_siswa') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.hapus_siswa') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.arsip_siswa') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            4
                        </th>
                        <td class="">
                            <div class="fw-medium">Antika Dewa Prasongko</div>
                            <div class="fs-sm">
                                SMAN 1 Surabaya
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-secondary">SMA/MA</span>
                                <span class="badge bg-primary">Kelas 12</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Adityo Bagus Contoh</div>
                            <div class="fs-sm">
                                081234567890
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Kelas Bimbel: 13</div>
                            <div class="fs-sm">Mentor: Ening Tri Ayu</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.siswa.ubah_siswa') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.hapus_siswa') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.arsip_siswa') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            5
                        </th>
                        <td class="">
                            <div class="fw-medium">Ventika Dera Serambi</div>
                            <div class="fs-sm">
                                SMAN 2 Surabaya
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-secondary">SMA/MA</span>
                                <span class="badge bg-primary">Kelas 12</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Tenjo Tigakarsa Pratama</div>
                            <div class="fs-sm">
                                081234567890
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">Kelas Bimbel: 29</div>
                            <div class="fs-sm">Mentor: Hendry Naufal Marbella</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.siswa.ubah_siswa') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.hapus_siswa') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.siswa.arsip_siswa') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
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

            table.searchPanes.container().prependTo(table.table().container());
            table.searchPanes.resizePanes();
        }
        static init() {
            this.initDataTables()
        }
    }
    Codebase.onLoad((() => a.init()))
}();
</script>

<?= $this->endSection() ?>
