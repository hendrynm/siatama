<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Siswa
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Daftar Siswa
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('src/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" href=""<?= base_url('src/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" href=""<?= base_url('src/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="#" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Siswa Aktif</span>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
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
                            <a href="#" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
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
                            <a href="#" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
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
                            <div class="fw-medium">Kelas Bimbel: 09</div>
                            <div class="fs-sm">Mentor: Ening Tri Ayu</div>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="#" class="btn btn-sm btn-alt-warning" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-danger" data-bs-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip" title="Arsipkan">
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
<script src="<?= base_url('src/assets/js/lib/jquery.min.js') ?>"></script>
<script src="<?= base_url('src/assets/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('src/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>

<script type="text/javascript">
    ! function() {
        class a {
            static initDataTables() {
                jQuery.extend(jQuery.fn.dataTable.ext.classes, {
                    sWrapper: "dataTables_wrapper dt-bootstrap5",
                    sFilterInput: "form-control",
                    sLengthSelect: "form-select",
                }),
                jQuery.extend(!0, jQuery.fn.dataTable.defaults, {
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json',
                    }
                }),
                jQuery(".datatable-datasiswa").DataTable({
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Semua"]
                    ],
                })
            }
            static init() {
                this.initDataTables()
            }
        }
        Codebase.onLoad((() => a.init()))
    }();
</script>

<?= $this->endSection() ?>
