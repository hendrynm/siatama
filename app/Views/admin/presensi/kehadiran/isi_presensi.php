<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Isi Kehadiran
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .custom-btn-circle {
        width: 5vh;
        height: 5vh;
        border-radius: 2.5vh;
        font-size: 14px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= route_to('admin.presensi.kehadiran.lihat_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Isi Kehadiran Siswa</span>
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
                <div class="row space-x-1">
                    <div class="col-12 space-x-3">
                        <a class="btn btn-alt-primary text-center" href="#">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-check fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Semua<br>Hadir</div>
                            </div>
                        </a>
                        
                        <a href="#" class="btn btn-alt-info text-center" data-bs-toggle="modal" data-bs-target="#modal-tambah-foto">
                            <div class="block-content py-3 px-4">
                                <div class="mb-3">
                                    <i class="fa fa-camera fa-2x"></i>
                                </div>
                                <div class="fw-medium" style="line-height: 1.25">Tambah<br>Foto</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3 d-block d-xl-none">
                <div class="row space-y-2">
                    <div class="col-12">
                        <a class="btn btn-alt-primary text-center" href="#" data-bs-toggle="tooltip" title="Anggap semua siswa hadir">
                            <i class="fa fa-check"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Semua Hadir</span>
                        </a>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-alt-info text-center" data-bs-toggle="modal" data-bs-target="#modal-tambah-foto">
                            <i class="fa fa-camera"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Foto</span>
                        </button>
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
                    <th class="col-7" style="min-width: 200px;">Data Siswa</th>
                    <th class="col-3" style="min-width: 125px;">Kehadiran</th>
                    <th class="col-1">Catatan</th>
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
                        <a href="#" class="btn btn-outline-success custom-btn-circle" data-bs-toggle="tooltip" title="Hadir" id="111-1">H</a>
                        <a href="#" class="btn btn-outline-info custom-btn-circle" data-bs-toggle="tooltip" title="Sakit" id="111-2">S</a>
                        <a href="#" class="btn btn-outline-warning custom-btn-circle" data-bs-toggle="tooltip" title="Izin" id="111-3">I</a>
                        <a href="#" class="btn btn-outline-danger custom-btn-circle" data-bs-toggle="tooltip" title="Alfa" id="111-4">A</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-catatan">
                            <i class="far fa-pen-to-square"></i>
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
                        <a href="#" class="btn btn-outline-success custom-btn-circle" data-bs-toggle="tooltip" title="Hadir" id="112-1">H</a>
                        <a href="#" class="btn btn-outline-info custom-btn-circle" data-bs-toggle="tooltip" title="Sakit" id="112-2">S</a>
                        <a href="#" class="btn btn-outline-warning custom-btn-circle" data-bs-toggle="tooltip" title="Izin" id="112-3">I</a>
                        <a href="#" class="btn btn-outline-danger custom-btn-circle" data-bs-toggle="tooltip" title="Alfa" id="112-4">A</a>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-catatan">
                            <i class="far fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-catatan" tabindex="-1" role="dialog" aria-labelledby="modal-catatan" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Catatan untuk Siswa</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">
                    <div class="form-floating mb-4">
                        <textarea class="form-control" id="example-textarea-floating" name="example-textarea-floating" style="height: 100px;" placeholder="Masukkan catatan disini"></textarea>
                        <label class="form-label" for="example-textarea-floating">Masukkan catatan disini...</label>
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

<div class="modal fade" id="modal-tambah-foto" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-foto" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Foto Kelas</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <label class="form-label" for="example-file-input">File foto (hanya 1 saja)</label>
                    <input class="form-control" type="file" id="example-file-input">
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

<?= $this->section('js') ?>

<?= $this->endSection() ?>
