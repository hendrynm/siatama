<?= $this->extend('admin/_layout/master') ?>

<?php helper(['form']) ?>

<?= $this->section('menu') ?>
Penilaian
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Lihat Komponen
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('admin.penilaian.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Daftar Komponen Penilaian</span>
        </div>
        <div class="block-content">
            <form action="<?= url_to('admin.penilaian.simpan_komponen') ?>" method="post">
                <?= csrf_field() ?>
                <div id="komponenContainer">
                    <?php foreach($nilai as $k=>$n): ?>
                    <?= form_hidden('id_nilai[]', $n->id_nilai) ?>
                        <div class="row my-3">
                            <label class="form-label fs-lg mb-n2 mb-md-3">Komponen Penilaian <?= ($k+1) ?></label>
                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama_nilai[]" name="nama_nilai[]" placeholder="" value="<?= $n->nama_nilai ?>" required>
                                    <label class="form-label" for="nama_nilai[]">Nama Komponen Penilaian</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <div class="form-floating">
                                    <select class="form-select" id="jenis[]" name="jenis[]" size="1" required>
                                        <option value="" selected disabled>-- pilih salah satu --</option>
                                        <option value="1" <?= ($n->jenis == 1) ? 'selected' : '' ?>>Objektif (berdasarkan angka/skor)</option>
                                        <option value="0" <?= ($n->jenis == 0) ? 'selected' : '' ?>>Subjektif (berdasarkan perspektif mentor)</option>
                                    </select>
                                    <label class="form-label" for="jenis[]">Jenis Nilai</label>
                                </div>
                            </div>
                            <?php foreach ($skor->{$n->id_nilai} as $i=>$s): ?>
                            <?= form_hidden('id_skor['.($k).'][]', $s->id_skor) ?>
                                <div class="col-6 col-md-2 mt-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="skor[<?= ($k) ?>][]" name="skor[<?= ($k) ?>][]" placeholder="" value="<?= $s->skor ?>">
                                        <label class="form-label" for="skor[<?= ($k) ?>][]">Skala <?= ($i+1) ?></label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php if($n->jenis == 0): ?>
                            <div class="col-6 col-md-2 mt-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="skor[<?= ($k) ?>][]" name="skor[<?= ($k) ?>][]" placeholder="" value="">
                                    <label class="form-label" for="skor[<?= ($k) ?>][]">Skala <?= (sizeof($skor->{$n->id_nilai})+1) ?></label>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
                <div class="row mt-5 mb-4">
                    <div class="col-12 col-lg-3 me-auto">
                        <button id="tambahKomponen" class="btn btn-primary text-white w-100 p-2" type="button">
                            <i class="fa fa-plus me-2"></i>
                            Tambah Komponen
                        </button>
                    </div>
                    <div class="col-12 col-lg-3 ms-auto mt-3 mt-lg-0">
                        <button class="btn btn-info w-100 p-2" type="submit">
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
        let komponenCounter = <?= count($nilai) ?>;

        $("#tambahKomponen").on("click", function() {
            komponenCounter++;

            let newRow = `
                <div class="row my-3">
                    <label class="form-label fs-lg mb-n2 mb-md-3">Komponen Penilaian ${komponenCounter}</label>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama_nilai[]" name="nama_nilai[]" placeholder="" value="" required>
                            <label class="form-label" for="nama_nilai[]">Nama Komponen Penilaian</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                        <div class="form-floating">
                            <select class="form-select" id="jenis[]" name="jenis[]" size="1" required>
                                <option value="" selected disabled>-- pilih salah satu --</option>
                                <option value="1">Objektif (berdasarkan angka/skor)</option>
                                <option value="0">Subjektif (berdasarkan perspektif mentor)</option>
                            </select>
                            <label class="form-label" for="jenis[]">Jenis Nilai</label>
                        </div>
                    </div>
                </div>
            `;

            // Append the new row to the container
            $("#komponenContainer").append(newRow);

            // Add Nilai Skala inputs dynamically
            for (let i = 1; i <= 6; i++) {
                let skorInput = `
                    <div class="col-6 col-md-2 mt-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="skor[${komponenCounter-1}][]" name="skor[${komponenCounter-1}][]" placeholder="" value="">
                            <label class="form-label" for="skor[${komponenCounter-1}][]">Skala ${i}</label>
                        </div>
                    </div>
                `;
                
                $("#komponenContainer .row:last").append(skorInput);
            }
        });
    });
</script>
<?= $this->endSection() ?>