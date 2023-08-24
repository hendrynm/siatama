<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Jenjang & Tingkat
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/nestable2/jquery.nestable.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12 col-lg-auto">
            <div class="fs-1 fw-semibold">
                Jenjang dan Tingkat
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
        <div class="col-12 col-lg-auto ms-auto">
            <a href="#" class="btn btn-alt-primary py-2 px-3 py-lg-3 px-lg-4 mt-3" data-bs-toggle="modal" data-bs-target="#modal-tambah-jenjang">
                <i class="fa fa-plus me-2"></i> Tambah Jenjang
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="block my-0">
                        <div class="block-content block-content-full bg-danger text-white fw-semibold py-2 ps-3 pe-2 fs-5 d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                SD/MI
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modal-tambah-tingkat">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="block">
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 1
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 2
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 3
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 4
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 5
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 6
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="block my-0">
                        <div class="block-content block-content-full bg-info text-white fw-semibold py-2 ps-3 pe-2 fs-5 d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                SMP/MTs
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modal-tambah-tingkat">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
                <div class="col-10">
                    <div class="block">
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 7
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 8
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 9
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="block my-0">
                        <div class="block-content block-content-full bg-secondary text-white fw-semibold py-2 ps-3 pe-2 fs-5 d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                SMA/MA IPA
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modal-tambah-tingkat">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
                <div class="col-10">
                    <div class="block">
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 10
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 11
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 12
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="block my-0">
                        <div class="block-content block-content-full bg-black-75 text-white fw-semibold py-2 ps-3 pe-2 fs-5 d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                SMA/MA IPS
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#modal-tambah-tingkat">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
                <div class="col-10">
                    <div class="block">
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 10
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 11
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content block-content-full fw-medium py-2 py-2 ps-3 pe-2 fs-sm d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Kelas 12
                            </div>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah-jenjang" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-jenjang" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Jenjang Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="example-text-input-floating" name="example-text-input-floating" placeholder="">
                        <label class="form-label" for="example-text-input-floating">Nama Jenjang</label>
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

<div class="modal fade" id="modal-tambah-tingkat" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-tingkat" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Tingkat Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <div class="form-floating mb-4">
                        <select class="form-select" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example">
                            <option value="" selected disabled>-- pilih salah satu--</option>
                            <option value="1">SD/MI</option>
                            <option value="2">SMP/MTs</option>
                            <option value="3">SMA/MA IPA</option>
                            <option value="4">SMA/MA IPS</option>
                        </select>
                        <label class="form-label" for="example-select-floating">Jenjang</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="example-text-input-floating" name="example-text-input-floating" placeholder="">
                        <label class="form-label" for="example-text-input-floating">Nama Tingkat</label>
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

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/nestable2/jquery.nestable.min.js') ?>

<script type="text/javascript">
! function() {
    class e {
        static nestable2() {
            jQuery(".jenjang-tingkat-sd").add(".jenjang-tingkat-smp").add(".jenjang-tingkat-sma-ipa").add(".jenjang-tingkat-sma-ips").nestable({
                maxDepth: 2,
                group: 0
            });
        }
        static init() {
            this.nestable2()
        }
    }
    Codebase.onLoad((() => e.init()))
}();
</script>
<?= $this->endSection() ?>
