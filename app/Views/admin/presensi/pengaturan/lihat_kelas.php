<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']); ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Detail Kelas
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/select2/css/select2.min.css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= route_to('admin.presensi.pengaturan.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Detail Kelas dan Siswa</span>
        </div>
        <div class="block-content px-3 py-4 d-flex row justify-content-between">
            <div class="col-12 col-xl-6 space-y-2">
                <div class="d-flex row space-y-1">
                    <div class="fs-lg">
                        <span class="badge bg-<?= $kelas->warna ?>"><?= $kelas->nama_jenjang ?></span>
                        <span class="badge bg-primary-op"><?= ($kelas->jenis == 0) ? 'Reguler' : 'Privat' ?></span>
                    </div>
                    <div class="fs-1">
                        <span class="fw-semibold">Kelas <?= $kelas->nama_kelas ?></span>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3">
                <div class="row">
                    <div class="col-4 col-lg-auto">
                        <a class="btn btn-alt-info text-center p-lg-3" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">
                            <i class="fa fa-user-plus"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Tambah Siswa</span>
                        </a>
                    </div>
                    <div class="col-4 col-lg-auto">
                        <a class="btn btn-alt-warning text-center p-lg-3" href="<?= url_to('PresensiController::pengaturan_ubah_kelas', $kelas->id_kelas) ?>">
                            <i class="fa fa-edit"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Ubah Kelas</span>
                        </a>
                    </div>
                    <div class="col-4 col-lg-auto">
                        <button class="btn btn-alt-danger text-center p-lg-3 tombol-hapus-kelas" data-id-kelas="<?= $kelas->id_kelas ?>">
                            <i class="fa fa-trash"></i>
                            <span class="fw-medium ms-2" style="line-height: 1.25">Hapus Kelas</span>
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
                    <th class="col-10" style="min-width: 200px;">Data Siswa</th>
                    <th class="col-1">Aksi</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                <?php foreach ($siswa as $k=>$s): ?>
                <tr>
                    <th class="text-center fw-medium" scope="row">
                        <?= $k+1 ?>
                    </th>
                    <td class="">
                        <div class="fw-medium"><?= $s->nama_siswa ?></div>
                        <div class="fs-sm"><?= $s->asal_sekolah ?></div>
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)" class="btn btn-outline-danger custom-btn-circle" data-bs-toggle="tooltip" title="Hapus Siswa">
                            <i class="fa fa-user-slash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form action="<?= route_to('admin.presensi.pengaturan.tambah_siswa.post') ?>" method="post">
<?= csrf_field() ?>
<input type="hidden" name="id_kelas" value="<?= $kelas->id_kelas ?>">
<div class="modal fade" id="modal-tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-siswa" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <label class="form-label" for="id-siswa">Nama Siswa</label>
                    <div class="form-floating mb-5">
                        <select class="form-select js-select2 fs-lg" id="id-siswa" name="id-siswa" data-container="#modal-tambah-siswa" data-placeholder="-- pilih salah satu --" style="width: 100%">
                            <option></option>
                            <?php foreach ($siswa_aktif as $sa): ?>
                            <option value="<?= $sa->id_siswa ?>"><?= $sa->nama_tingkat . ' - ' . $sa->nama_siswa ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-danger btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-alt-primary btn-sm" data-bs-dismiss="modal">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/select2/js/select2.full.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    let sa;
    ! function() {
        class e {
            static sweetAlert2() {
                sa = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-alt-primary m-1",
                        cancelButton: "btn btn-alt-danger m-1",
                        input: "form-control"
                    }
                });
            }
            static init() {
                this.sweetAlert2()
            }
        }
        Codebase.onLoad((() => e.init()));
        Codebase.helpersOnLoad(['jq-select2']);
    }();
    
    $(document).ready(function() {
        $('.tombol-hapus-kelas').on('click', function() {
            let id_kelas = $(this).data('id-kelas');
            
            sa.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus kelas ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= route_to('admin.presensi.pengaturan.hapus_kelas') ?>',
                        type: 'post',
                        data: {
                            <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                            id_kelas: id_kelas
                        },
                        success: function() {
                            sa.fire({
                                title: 'Berhasil',
                                text: 'Kelas berhasil dihapus',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '<?= route_to('admin.presensi.pengaturan.pilih_kelas') ?>';
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
