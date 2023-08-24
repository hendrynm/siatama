<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Mentor
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Mentor Aktif
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
            <a href="<?= route_to('admin.mentor.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Mentor Aktif</span>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datamentor">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-auto">No.</th>
                        <th class="col-6" style="min-width: 150px;">Nama Lengkap</th>
                        <th class="col-3" style="min-width: 150px;">Kontak</th>
                        <th class="col-auto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            1
                        </th>
                        <td class="fw-medium">
                            Brian Aprilio Pramono Putra
                        </td>
                        <td class="">
                            081234567890
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.mentor.ubah_mentor') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.mentor.hapus_mentor') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.mentor.arsip_mentor') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
                                <i class="fa fa-archive"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fw-medium" scope="row">
                            2
                        </th>
                        <td class="fw-medium">
                            Bena Bianda Putri Cantikka
                        </td>
                        <td class="">
                            081234567890
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= route_to('admin.mentor.ubah_mentor') ?>" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="<?= route_to('admin.mentor.hapus_mentor') ?>" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?= route_to('admin.mentor.arsip_mentor') ?>" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
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

                const table = jQuery(".datatable-datamentor").DataTable({
                    searchPanes: {
                        threshold: 1,
                        initCollapsed: true,
                        orderable: false,
                        cascadePanes: true,
                        viewTotal: true,
                        columns: [1, 2]
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
