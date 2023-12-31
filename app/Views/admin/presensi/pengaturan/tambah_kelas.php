<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Presensi
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Tambah Kelas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-info px-4 d-flex">
            <a href="<?= route_to('admin.presensi.pengaturan.pilih_kelas') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Tambah Kelas Baru</span>
        </div>
        <div class="block-content">
            <form action="<?= route_to('admin.presensi.pengaturan.tambah_kelas') ?>" method="post">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-floating">
                            <select class="form-select" id="id_jenjang" name="id_jenjang" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <?php foreach ($jenjang as $j): ?>
                                <option value="<?= $j->id_jenjang ?>"><?= $j->nama_jenjang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="form-label" for="id_jenjang">Jenjang</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="id_tingkat" name="id_tingkat" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                            </select>
                            <label class="form-label" for="id_tingkat">Kelas</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="jenis" name="jenis" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="0">Kelas Reguler</option>
                                <option value="1">Kelas Privat</option>
                            </select>
                            <label class="form-label" for="jenis">Jenis Kelas</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mt-4 mt-md-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="" required>
                            <label class="form-label" for="nama_kelas">Nama Kelas</label>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 col-md-2 ms-auto">
                        <button class="btn btn-info w-100 p-2">
                            <i class="fa fa-save me-2"></i>
                            Simpan Data
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
<script type="text/javascript">
    $(document).ready(function() {
        let id_jenjang = $('#id_jenjang');
        let id_tingkat = $('#id_tingkat');
        
        id_jenjang.change(function() {
            let selectedJenjang = $(this).val();
            
            $.ajax({
                url: '<?= url_to('admin.presensi.pengaturan.daftar_tingkat') ?>',
                method: 'POST',
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    id_jenjang: selectedJenjang
                },
                dataType: 'json',
                success: function(response) {
                    id_tingkat.empty();
                    id_tingkat.append('<option value="" selected disabled>-- pilih salah satu --</option>');
                    
                    $.each(response, function(key, value) {
                        $('#id_tingkat').append('<option value="' + value.id_tingkat + '">' + value.nama_tingkat + '</option>');
                    });
                },
            });
        });
    });
</script>
<?= $this->endSection() ?>
