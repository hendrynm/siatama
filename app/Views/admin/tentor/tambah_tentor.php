<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Data Tentor
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Tentor
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= url_to('admin.tentor.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Tentor Baru</span>
        </div>
        <div class="block-content">
            <form action="<?= url_to('admin.tentor.tambah_tentor') ?>" method="post" class="form-tentor">
                <?= csrf_field() ?>
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-8 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="nama_pengajar" name="nama_pengajar" placeholder="">
                            <label class="form-label" for="nama_pengajar">Nama Lengkap Tentor</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="nomor_hp" name="nomor_hp" placeholder="">
                            <label class="form-label" for="nomor_hp">Nomor HP</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="email" class="form-control fw-semibold" id="email_bimbel" name="email_bimbel" placeholder="">
                            <label class="form-label" for="email_bimbel">Email Bimbel</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="email" class="form-control fw-semibold" id="email_pribadi" name="email_pribadi" placeholder="">
                            <label class="form-label" for="email_pribadi">Email Pribadi</label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="alamat" name="alamat" placeholder="">
                            <label class="form-label" for="alamat">Alamat Rumah</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6 col-lg-2 ms-auto">
                        <button type="submit" class="btn btn-info w-100">
                            <i class="fa fa-save me-2"></i> Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/jquery-validation/jquery.validate.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<!-- Page JS Code -->
<script type="text/javascript">
    ! function() {
        class e {
            static initValidationSignIn() {
                Codebase.helpers('jq-validation'), jQuery('.form-tentor').validate({
                    rules: {
                        'nama_pengajar': { required: !0 },
                        'nomor_hp': { required: !0, minlength: 10, maxlength: 13, digits: !0 },
                        'email_bimbel': { required: !0 },
                    },
                    messages: {
                        'nama_pengajar': { required: "Nama lengkap pengajar / tentor wajib diisi!" },
                        'nomor_hp': { required: "Nomor HP tentor wajib diisi!", minlength: "Nomor HP tentor minimal 10 digit!", maxlength: "Nomor HP tentor maksimal 13 digit!", digits: "Nomor HP tentor hanya boleh berisi angka saja!" },
                        'email_bimbel': { required: "Email bimbel tentor wajib diisi!" },
                    }
                })
            }
            static sweetAlert2() {
                let e = Swal.mixin({
                    buttonsStyling: !1,
                    target: "#page-container",
                    customClass: {
                        confirmButton: "btn btn-alt-primary m-1",
                        cancelButton: "btn btn-alt-danger m-1",
                        input: "form-control"
                    }
                });
                <?php if (session()->getFlashdata('error')): ?>
                e.fire({
                    title: 'Kesalahan!',
                    html: '<?= session()->getFlashdata("error") ?>',
                    icon: 'error'
                });
                <?php endif; ?>
            }
            static init() {
                this.initValidationSignIn();
                this.sweetAlert2();
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
</script>
<?= $this->endSection() ?>