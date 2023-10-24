<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Semester
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                Semester
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="block text-end">
                <div class="block-content block-content-full d-md-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Semester Aktif:
                        </div>
                        <div class="fw-semibold fs-3">
                            <?= $semester->nama_semester ?>
                        </div>
                    </div>
                    <div class="text-end mt-4 mt-md-0">
                        <a href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-ganti-semester">
                            <i class="fa fa-person-arrow-up-from-line me-2"></i> Ganti ke Semester Berikutnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?= url_to('admin.semester.ganti') ?>" method="post">
<?= csrf_field() ?>
<div class="modal fade" id="modal-ganti-semester" tabindex="-1" role="dialog" aria-labelledby="modal-ganti-semester" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Ganti Semester Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="fs-lg fw-semibold mb-2">Tindakan yang dilakukan pada Semester Gasal:</div>
                            <div class="space-y-2">
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data penilaian</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data pertemuan</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data presensi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="fs-lg fw-semibold mb-2">Tindakan yang dilakukan pada Semester Genap:</div>
                            <div class="space-y-2">
                                <div class="">
                                    <div class="fs-base fw-medium">- Ubah semua tingkat siswa dalam satu jenjang, kecuali tingkat akhir</div>
                                    <div class="fs-sm ms-3">Misal: kelas 1 jadi kelas 2, kelas 7 jadi kelas 8, kelas 9 tetap jadi kelas 9, dst.</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Arsipkan semua siswa tingkat akhir</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data jadwal</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data kelas</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data pembayaran</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data penilaian</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data pertemuan</div>
                                </div>
                                <div class="">
                                    <div class="fs-base fw-medium">- Hapus semua data presensi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="text-danger fw-bold fs-lg">
                                Catatan: Tindakan ini TIDAK BISA DIBATALKAN!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary btn-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                        Proses Ganti Semester
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
                
                <?php if(session()->has('success')): ?>
                    sa.fire({
                        icon: "success",
                        title: "<?= session()->getFlashdata('success') ?>"
                    });
                <?php endif; ?>
                
                <?php if(session()->has('error')): ?>
                    sa.fire({
                        icon: "error",
                        title: "<?= session()->getFlashdata('error') ?>"
                    });
                <?php endif; ?>
            }
            static init() {
                this.sweetAlert2()
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
</script>
<?= $this->endSection() ?>