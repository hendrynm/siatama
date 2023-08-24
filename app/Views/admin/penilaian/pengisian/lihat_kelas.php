<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Penilaian
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.penilaian.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Kelas dan Penilaian</span>
        </div>
        <div class="block-content px-3 py-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-6 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-base">
                        <span class="badge bg-info">SMP</span>
                        <span class="badge bg-primary-op">Kelas 7</span>
                    </div>
                    <div class="fs-lg">
                        <span class="fw-semibold">Reguler Kelas 20</span>
                    </div>
                </div>
                <div class="fs-sm row space-y-1">
                    <div class="col-12 col-md-6 col-lg-12 col-xxl-6 row">
                        <div class="col-5">
                            <i class="far fa-calendar text-primary"></i><span class="ms-2">Senin</span>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-clock text-primary"></i><span class="ms-2">16:00 - 18:00</span>
                        </div>
                    </div>
                </div>
                <div class="fs-sm d-flex flex-column">
                    <div class="fw-medium">Mentor:</div>
                    <div class="">Hendry Naufal Marbella</div>
                </div>
            </div>
            <div class="col-auto d-none d-xl-block">
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-alt-primary text-center" href="<?= route_to('admin.penilaian.tambah_penilaian') ?>">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-plus fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Tambah<br>Penilaian</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3 d-block d-xl-none">
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-alt-primary text-center" href="<?= route_to('admin.penilaian.tambah_penilaian') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Penilaian</span>
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
            <div class="table-responsive p-0">
                <table class="table table-hover my-0">
                    <thead>
                    <tr class="bg-gray text-sm text-center">
                        <th class="col-2">Penilaian Ke-</th>
                        <th class="col-4">Tanggal</th>
                        <th class="col-4">Jenis Penilaian</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    <tr>
                        <th class="text-center fs-1 fw-medium" scope="row">
                            1
                        </th>
                        <td class="">
                            <div class="fw-medium">Senin, 20 September 2021</div>
                        </td>
                        <td class="">
                            Ulangan
                        </td>
                        <td class="text-center">
                            <div class="space-y-1">
                                <a href="<?= route_to('admin.penilaian.isi_penilaian') ?>" class="btn btn-alt-primary btn-sm w-100"><i class="fa fa-eye me-2"></i>Penilaian</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fs-1 fw-medium" scope="row">
                            2
                        </th>
                        <td class="">
                            <div class="fw-medium">Senin, 30 September 2021</div>
                        </td>
                        <td class="">
                            Sikap
                        </td>
                        <td class="text-center">
                            <div class="space-y-1">
                                <a href="<?= route_to('admin.penilaian.isi_penilaian') ?>" class="btn btn-alt-primary btn-sm w-100"><i class="fa fa-eye me-2"></i>Penilaian</a>
                                <a href="<?= route_to('admin.penilaian.ubah_penilaian') ?>" class="btn btn-alt-warning btn-sm w-100"><i class="fa fa-edit me-2"></i>Ubah</a>
                                <a href="#" class="btn btn-alt-danger btn-sm w-100"><i class="fa fa-trash me-2"></i>Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center fs-1 fw-medium" scope="row">
                            3
                        </th>
                        <td class="">
                            <div class="fw-medium">Senin, 10 Oktober 2021</div>
                        </td>
                        <td class="">
                            Keaktifan
                        </td>
                        <td class="text-center">
                            <div class="space-y-1">
                                <a href="<?= route_to('admin.penilaian.isi_penilaian') ?>" class="btn btn-alt-primary btn-sm w-100"><i class="fa fa-eye me-2"></i>Penilaian</a>
                                <a href="<?= route_to('admin.penilaian.ubah_penilaian') ?>" class="btn btn-alt-warning btn-sm w-100"><i class="fa fa-edit me-2"></i>Ubah</a>
                                <a href="#" class="btn btn-alt-danger btn-sm w-100"><i class="fa fa-trash me-2"></i>Hapus</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
