<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Harga Paket
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Beranda
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="row mb-4">
        <div class="col-12">
            <div class="fs-1 fw-semibold">
                Harga Paket
            </div>
            <div class="fs-5">
                Silakan memilih menu di bawah ini
            </div>
        </div>
    </div>
    
    <?php if(getenv('CI_ENVIRONMENT') == 'development'): ?>
    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <div class="hero-sm bg-body-extra-light">
                    <div class="hero-inner">
                        <div class="content">
                            <div class="py-4 text-center">
                                <i class="si si-chemistry text-primary display-2"></i>
                                <h1 class="h1 fw-bold mt-4 mb-3">Fitur Dalam Pengembangan!</h1>
                                <h2 class="h4 fw-medium text-muted mb-5">Silakan cek kembali lain waktu 😇🙏</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>