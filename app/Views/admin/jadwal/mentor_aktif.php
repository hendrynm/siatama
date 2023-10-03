<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Jadwal Les
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tentor
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
            <a href="<?= route_to('admin.jadwal.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Jadwal Mengajar per Tentor</span>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datamentor">
                    <thead>
                    <tr class="bg-gray text-sm">
                        <th class="col-auto text-center" rowspan="2" style="max-width: 50px;">No.</th>
                        <th class="col-3 text-center" rowspan="2">Nama Lengkap</th>
                        <th class="col-8 text-center" colspan="7" style="min-width: 300px;" >Jadwal</th>
                        <th class="col-auto text-center" rowspan="2" style="max-width: 50px;">Aksi</th>
                    </tr>
                    <tr>
                        <th class="col-1">Senin</th>
                        <th class="col-1">Selasa</th>
                        <th class="col-1">Rabu</th>
                        <th class="col-1">Kamis</th>
                        <th class="col-1">Jumat</th>
                        <th class="col-1">Sabtu</th>
                        <th class="col-1">Minggu</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <tr>
                        <th class="text-center fw-medium fs-4" scope="row">
                            1
                        </th>
                        <td class="">
                            <div class="fw-medium">Ening Tri Ayu</div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 10</span>
                                <span class="fs-xs">10.00 - 12.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="javascript:void(0)" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium fs-4" scope="row">
                            2
                        </th>
                        <td class="">
                            <div class="fw-medium">Hendry Naufal Marbella</div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="">
                            <div class="">
                                <span class="badge bg-primary me-2">Kelas 20</span>
                                <span class="fs-xs">08.00 - 10.00</span>
                            </div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="javascript:void(0)" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
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

            const table = jQuery(".datatable-datamentor").DataTable({
                searchPanes: {
                    threshold: 1,
                    initCollapsed: true,
                    orderable: false,
                    cascadePanes: true,
                    viewTotal: true,
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
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
