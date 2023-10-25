<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_nomor_hp', 'ubah_harga']); ?>

<?= $this->section('menu') ?>
Pembayaran
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Daftar Pembayaran
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
            <a href="<?= route_to('admin.pembayaran.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Pembayaran Bimbel</span>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-hover datatable-datasiswa">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-auto">No.</th>
                        <th class="col-5" style="min-width: 150px;">Nama Lengkap</th>
                        <th class="col-3">Informasi Paket</th>
                        <th class="col-4" style="min-width: 150px;">Pembayaran</th>
                        <th class="col-auto">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php foreach ($siswa as $k1=>$v1): ?>
                    <tr>
                        <th class="text-center fw-medium fs-lg" scope="row">
                            <?= $k1+1 ?>
                        </th>
                        <td class="">
                            <div class="fw-medium">
                                <?= $v1['siswa']->nama_siswa ?>
                            </div>
                            <div class="fs-sm">
                                <?= $v1['siswa']->asal_sekolah ?>
                            </div>
                            <div class="fs-sm">
                                <span class="badge bg-<?= $v1['siswa']->warna ?>"><?= $v1['siswa']->nama_jenjang ?></span>
                                <span class="badge bg-primary"><?= $v1['siswa']->nama_tingkat ?></span>
                            </div>
                        </td>
                        <td class="">
                            <div class="fw-medium">
                                <?= $v1['siswa']->jenis === '0' ? 'Reguler' : 'Privat' ?> - <?= $v1['siswa']->nama_paket ?>
                            </div>
                            <div class="fs-sm">
                                <?= ubah_harga($v1['siswa']->harga_paket) ?><?= $v1['siswa']->jenis === '0' ? '/bulan' : '/pertemuan' ?>
                            </div>
                        </td>
                        <td class="">
                            <?php if($v1['status'][2]['status'] === 'Lunas'): ?>
                                <div class="badge bg-success">
                                    <?= $v1['status'][2]['periode'] . ' &nbsp; ' . $v1['status'][2]['status'] . ' &nbsp; ' . ubah_harga($v1['status'][2]['total']) ?>
                                </div>
                            <?php else: ?>
                                <div class="badge bg-danger">
                                    <?= $v1['status'][2]['periode'] . ' &nbsp; ' . $v1['status'][2]['status'] . ' &nbsp; ' ?>
                                    <?= ($v1['status'][2]['harga'] != 0) ? ubah_harga($v1['status'][2]['harga']) : ubah_harga($v1['status'][2]['total']) ?>
                                </div>
                            <?php endif; ?>
                            <br/>
                            <?php if($v1['status'][1]['status'] === 'Lunas'): ?>
                                <div class="badge bg-success">
                                    <?= $v1['status'][1]['periode'] . ' &nbsp; ' . $v1['status'][1]['status'] . ' &nbsp; ' . ubah_harga($v1['status'][1]['total']) ?>
                                </div>
                            <?php else: ?>
                                <div class="badge bg-danger">
                                    <?= $v1['status'][1]['periode'] . ' &nbsp; ' . $v1['status'][1]['status'] . ' &nbsp; ' ?>
                                    <?= ($v1['status'][1]['harga'] != 0) ? ubah_harga($v1['status'][1]['harga']) : ubah_harga($v1['status'][1]['total']) ?>
                                </div>
                            <?php endif; ?>
                            <br/>
                            <?php if($v1['status'][0]['status'] === 'Lunas'): ?>
                                <div class="badge bg-success">
                                    <?= $v1['status'][0]['periode'] . ' &nbsp; ' . $v1['status'][0]['status'] . ' &nbsp; ' . ubah_harga($v1['status'][0]['total']) ?>
                                </div>
                            <?php else: ?>
                                <div class="badge bg-danger">
                                    <?= $v1['status'][0]['periode'] . ' &nbsp; ' . $v1['status'][0]['status'] . ' &nbsp; ' ?>
                                    <?= ($v1['status'][0]['harga'] != 0) ? ubah_harga($v1['status'][0]['harga']) : ubah_harga($v1['status'][0]['total']) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-center space-y-1">
                            <a href="<?= url_to('PembayaranController::detail_bayar', $v1['siswa']->id_siswa) ?>" class="btn btn-sm btn-alt-info">
                                <i class="fa fa-eye"></i>Detail
                            </a>
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
        static init() {
            this.initDataTables();
        }
    }
    Codebase.onLoad((() => a.init()))
}();
</script>

<?= $this->endSection() ?>
