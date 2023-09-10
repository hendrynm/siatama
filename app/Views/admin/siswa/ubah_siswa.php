<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form', 'ubah_harga']) ?>

<?= $this->section('menu') ?>
Data Siswa
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Ubah Siswa
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= route_to('admin.siswa.siswa_aktif') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Ubah Siswa</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.siswa.ubah_siswa.post') ?>" method="post" class="form-siswa">
                <?= csrf_field() ?>
                <?= form_hidden('id_siswa', $siswa->id_siswa) ?>
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="nama_siswa" name="nama_siswa" placeholder="" value="<?= old('nama_siswa') ?? $siswa->nama_siswa ?>">
                            <label class="form-label" for="nama_siswa">Nama Lengkap Siswa</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="sekolah" name="sekolah" placeholder="" value="<?= old('sekolah') ?? $siswa->asal_sekolah ?>">
                            <label class="form-label" for="sekolah">Asal Sekolah</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-lg-4">
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="nama_ortu" name="nama_ortu" placeholder="" value="<?= old('nama_ortu') ?? $siswa->nama_ortu ?>">
                            <label class="form-label" for="nama_ortu">Nama Orang Tua</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <div class="form-floating">
                            <input type="text" class="form-control fw-semibold" id="hp_ortu" name="hp_ortu" placeholder="" value="<?= old('hp_ortu') ?? $siswa->telepon_ortu ?>" pattern="^\d{10,13}$">
                            <label class="form-label" for="hp_ortu">Nomor HP orang Tua</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-3">
                        <div class="form-floating">
                            <select class="form-select fw-semibold" id="jenjang" name="jenjang" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <?php foreach ($jenjang as $key => $value): ?>
                                    <option value="<?= $value->id_jenjang ?>" <?= ($value->id_jenjang == $siswa->id_jenjang) ? 'selected' : '' ?>><?= $value->nama_jenjang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="form-label" for="jenjang">Jenjang</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select fw-semibold" id="tingkat" name="tingkat" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <?php foreach ($tingkat as $t) {
                                    if($t->id_jenjang === $siswa->id_jenjang) {
                                        if ($t->id_tingkat === $siswa->id_tingkat) {
                                            echo '<option value="' . $t->id_tingkat . '" selected>' . $t->nama_tingkat . '</option>';
                                        } else {
                                            echo '<option value="' . $t->id_tingkat . '">' . $t->nama_tingkat . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label class="form-label" for="tingkat">Kelas</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select fw-semibold" id="paket" name="paket" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <?php foreach ($paket as $p) {
                                    if($p->id_tingkat === $siswa->id_tingkat) {
                                        if ($p->id_paket === $siswa->id_paket) {
                                            echo '<option value="' . $p->id_paket . '" selected>' . $p->nama_paket . ' - ' . ubah_harga($p->harga_paket) . '</option>';
                                        } else {
                                            echo '<option value="' . $p->id_paket . '">' . $p->nama_paket . ' - ' . ubah_harga($p->harga_paket) . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label class="form-label" for="paket">Paket</label>
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
                Codebase.helpers('jq-validation'), jQuery('.form-siswa').validate({
                    rules: {
                        'nama_siswa': { required: !0 },
                        'sekolah': { required: !0 },
                        'nama_ortu': { required: !0 },
                        'hp_ortu': { required: !0, minlength: 10, maxlength: 13, digits: !0 },
                        'jenjang': { required: !0 },
                        'tingkat': { required: !0 },
                        'paket': { required: !0 },
                    },
                    messages: {
                        'nama_siswa': { required: "Nama lengkap siswa wajib diisi!" },
                        'sekolah': { required: "Asal sekolah siswa wajib diisi!" },
                        'nama_ortu': { required: "Nama orang tua siswa wajib diisi!" },
                        'hp_ortu': { required: "Nomor HP orang tua siswa wajib diisi!", minlength: "Nomor HP orang tua siswa minimal 10 digit!", maxlength: "Nomor HP orang tua siswa maksimal 13 digit!", digits: "Nomor HP orang tua hanya boleh berisi angka saja!" },
                        'jenjang': { required: "Jenjang siswa wajib diisi!" },
                        'tingkat': { required: "Tingkat siswa wajib diisi!" },
                        'paket': { required: "Paket siswa wajib diisi!" },
                    }
                })
            }
            static initDropdownJenjang() {
                // Data tingkat berdasarkan jenjang
                const kelasOptions = {
                    <?php
                    // Menghasilkan data tingkat berdasarkan jenjang dari PHP
                    foreach ($jenjang as $j) {
                        echo '"' . $j->id_jenjang . '": ['; // Mulai array tingkat
                        // Loop melalui tingkat untuk jenjang tertentu
                        foreach ($tingkat as $t) {
                            if ($t->id_jenjang === $j->id_jenjang) {
                                echo '{
                                "id_tingkat":"' . $t->id_tingkat . '",
                                "nama_tingkat":"' . $t->nama_tingkat . '"
                                },';
                            }
                        }
                        echo '],'; // Akhiri array tingkat
                    }
                    ?>
                };

                // Data paket berdasarkan id_paket
                const paketOptions = {
                    <?php
                    // Menghasilkan data tingkat berdasarkan jenjang dari PHP
                    foreach ($tingkat as $t) {
                        echo '"' . $t->id_tingkat . '": ['; // Mulai array tingkat
                        // Loop melalui tingkat untuk jenjang tertentu
                        foreach($paket as $p) {
                            if ($p->id_tingkat === $t->id_tingkat) {
                                echo '{
                                "id_paket":"' . $p->id_paket . '",
                                "nama_paket":"' . $p->nama_paket . ' - ' . ubah_harga($p->harga_paket) . '"
                                },';
                            }
                        }
                        echo '],'; // Akhiri array tingkat
                    }
                    ?>
                };

                // Ambil elemen-elemen dropdown
                const jenjangDropdown = document.getElementById('jenjang');
                const tingkatDropdown = document.getElementById('tingkat');
                const paketDropdown = document.getElementById('paket');

                // Tambahkan event listener pada dropdown jenjang
                jenjangDropdown.addEventListener('change', function () {
                    // Dapatkan nilai yang dipilih pada dropdown jenjang
                    const selectedJenjang = jenjangDropdown.value;

                    // Hapus semua opsi pada dropdown kelas
                    tingkatDropdown.innerHTML = '<option value="" selected disabled>-- pilih salah satu --</option>';
                    paketDropdown.innerHTML = '<option value="" selected disabled>-- pilih salah satu --</option>';

                    // Tambahkan opsi kelas berdasarkan jenjang yang dipilih
                    kelasOptions[selectedJenjang].forEach(function (kelas) {
                        const option = document.createElement('option');
                        option.value = kelas.id_tingkat;
                        option.textContent = kelas.nama_tingkat;
                        tingkatDropdown.appendChild(option);
                    });
                });
                
                // Tambahkan event listener pada dropdown tingkat
                tingkatDropdown.addEventListener('change', function () {
                    // Dapatkan nilai yang dipilih pada dropdown tingkat
                    const selectedTingkat = tingkatDropdown.value;

                    // Hapus semua opsi pada dropdown paket
                    paketDropdown.innerHTML = '<option value="" selected disabled>-- pilih salah satu --</option>';
                    
                    // Tambahkan opsi paket berdasarkan tingkat yang dipilih
                    paketOptions[selectedTingkat].forEach(function (paket) {
                        const option = document.createElement('option');
                        option.value = paket.id_paket;
                        option.textContent = paket.nama_paket;
                        paketDropdown.appendChild(option);
                    });
                });
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
                this.initDropdownJenjang();
                this.sweetAlert2();
            }
        }
        Codebase.onLoad((() => e.init()))
    }();
</script>
<?= $this->endSection() ?>