<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.presensi.pengaturan.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Kelas dan Siswa</span>
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
                    <div class="fw-medium">Tentor:</div>
                    <div class="">Hendry Naufal Marbella</div>
                </div>
            </div>
            <div class="col-auto d-none d-xl-block">
                <div class="row">
                    <div class="col-12 space-x-2">
                        <a class="btn btn-alt-info text-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-user-plus fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Tambah<br>Siswa</div>
                            </div>
                        </a>
                        <a class="btn btn-alt-warning text-center" href="<?= route_to('admin.presensi.pengaturan.ubah_kelas') ?>">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-edit fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Ubah<br>Kelas</div>
                            </div>
                        </a>
                        <a class="btn btn-alt-danger text-center" href="<?= route_to('admin.presensi.pengaturan.hapus_kelas') ?>">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-trash fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Hapus<br>Kelas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3 d-block d-xl-none">
                <div class="row space-y-2">
                    <div class="col-12">
                        <a class="btn btn-alt-info text-center" href="#" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">
                            <i class="fa fa-user-plus"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Siswa</span>
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-alt-warning text-center" href="<?= route_to('admin.presensi.pengaturan.ubah_kelas') ?>">
                            <i class="fa fa-edit"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Ubah Kelas</span>
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-alt-danger text-center" href="<?= route_to('admin.presensi.pengaturan.hapus_kelas') ?>">
                            <i class="fa fa-trash"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Hapus Kelas</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="block block-bordered">
        <div class="table-responsive p-0">
            <table class="table table-hover my-0">
                <thead>
                <tr class="bg-gray text-sm text-center">
                    <th class="col-1">No.</th>
                    <th class="col-10" style="min-width: 200px;">Data Siswa</th>
                    <th class="col-1">Aksi</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                <tr>
                    <th class="text-center fw-medium" scope="row">
                        1
                    </th>
                    <td class="">
                        <div class="fw-medium">Hendry Naufal Marbella</div>
                        <div class="fs-sm">SMPN 1 Surabaya</div>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-danger custom-btn-circle" data-bs-toggle="tooltip" title="Hapus Siswa">
                            <i class="fa fa-user-slash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="text-center fw-medium" scope="row">
                        2
                    </th>
                    <td class="">
                        <div class="fw-medium">Ening Tri Ayu</div>
                        <div class="fs-sm">SMPK Santa Maria Surabaya</div>
                    </td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-danger custom-btn-circle" data-bs-toggle="tooltip" title="Hapus Siswa">
                            <i class="fa fa-user-slash"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-siswa" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Siswa Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="form-floating mb-4">
                        <select class="form-select" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example">
                            <option value="" selected disabled>-- pilih salah satu --</option>
                            <option value="1">Kelas 7</option>
                            <option value="2">Kelas 8</option>
                            <option value="3">Kelas 9</option>
                        </select>
                        <label class="form-label" for="example-select-floating">Kelas</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example">
                            <option value="" selected disabled>-- pilih salah satu --</option>
                            <option value="1">Hendry Naufal Marbella</option>
                            <option value="2">Ening Tri Ayu</option>
                            <option value="3">Bena Bianda Putri Cantikka</option>
                        </select>
                        <label class="form-label" for="example-select-floating">Nama Siswa</label>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-alt-primary btn-sm" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
