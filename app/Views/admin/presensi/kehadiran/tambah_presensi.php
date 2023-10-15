<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']) ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Presensi
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/select2/css/select2.min.css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('PresensiController::kehadiran_lihat_kelas', $kelas->id_kelas) ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Presensi</span>
        </div>
        <div class="block-content px-3 pt-4 d-flex row justify-content-between">
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
        </div>
        
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.kehadiran.tambah_presensi.post') ?>" method="post" id="form-tambah">
                <?= csrf_field() ?>
                <?= form_hidden('id_kelas', $kelas->id_kelas) ?>
                <div class="row mb-4">
                    <div class="col-12 col-lg-2">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="tatap_muka" name="tatap_muka" placeholder="" value="<?= $tatap_muka ?>" required readonly>
                            <label class="form-label" for="tatap_muka">Tatap Muka Ke-</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-4 mt-lg-0">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="" required>
                            <label class="form-label" for="tanggal">Tanggal dan Waktu Mulai</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-4 mt-lg-0">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="selesai" name="selesai" placeholder="" required>
                            <label class="form-label" for="selesai">Tanggal dan Waktu Selesai</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-4 mt-md-0">
                        <label class="form-label fs-sm text-gray-dark" for="id_pengajar" style="line-height: 0;">Tentor</label>
                        <div class="form-floating">
                            <select class="form-select js-select2 w-100" id="id_pengajar" name="id_pengajar" data-placeholder="-- pilih salah satu --" required>
                                <option></option>
                                <?php foreach ($pengajar as $p): ?>
                                    <option value="<?= $p->id_pengajar ?>"><?= $p->nama_pengajar ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-12 col-lg-3 ms-auto">
                        <button class="btn btn-info w-100 p-2">
                            <i class="fa fa-save me-2"></i>
                            Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Floating Labels Contact -->
</div>

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
                
                <?php if(session()->getFlashdata('error')): ?>
                    sa.fire({
                        icon: 'error',
                        title: 'Kesalahan!',
                        html: '<?= session()->getFlashdata('error') ?>',
                    });
                <?php endif; ?>
            }
            static init() {
                this.sweetAlert2()
            }
        }
        Codebase.onLoad((() => e.init()))
        Codebase.helpersOnLoad(["jq-select2"])
    }();
    
    $(document).ready(function() {
        $('#form-tambah').on('click', '.btn-info', function(e) {
            e.preventDefault();
            let form = $(this).parents('form');
            
            let tanggal = $('#tanggal').val();
            let selesai = $('#selesai').val();
            
            if(tanggal >= selesai) {
                sa.fire({
                    icon: 'error',
                    title: 'Kesalahan Pengguna!',
                    html: 'Waktu selesai <b>tidak boleh</b> kurang dari Waktu mulai!',
                });
            }
            else if(new Date(tanggal) < new Date(new Date().setDate(new Date().getDate() - 2))) {
                sa.fire({
                    icon: 'error',
                    title: 'Kesalahan Pengguna!',
                    html: 'Waktu mulai <b>sudah lewat</b> batas pengisian maksimal!',
                });
            }
            else
            {
                form.submit();
            }
        });
    });
</script>
<?= $this->endSection() ?>
