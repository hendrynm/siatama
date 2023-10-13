<?= $this->extend('admin/_layout/master') ?>

<?php helper(['ubah_tanggal']) ?>

<?= $this->section('menu') ?>
Laporan
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Laporan Siswa
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<style>
    .timeline-modern::before {
        background-color: rgba(54, 179, 160, 0.4);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12" id="cetak">
    <div class="row">
        <div class="col-12">
            <div class="block block-bordered">
                <div class="block-header bg-primary px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <a href="<?= url_to('LaporanController::lihat_kelas', $kelas->id_kelas) ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
                        <span class="ms-3 me-auto text-white fs-5 fw-semibold">Laporan Kemajuan Siswa</span>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-alt-info btn-sm" id="tombol-cetak">
                            <i class="fa fa-print me-2"></i>Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fs-3 fw-semibold"><?= $siswa->nama_siswa ?></div>
                        <div class="fs-6 fw-medium text-muted"><?= $siswa->asal_sekolah ?></div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-user-graduate fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-6">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-1" style="line-height: 1">
                            <?= $kelas->nama_kelas ?>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-<?= $kelas->warna ?>"><?= $kelas->nama_jenjang ?></div>
                        <div class="fw-semibold text-primary"><?= ($kelas->jenis == 0) ? 'Reguler' : '<span class="bg-primary text-white px-1">Privat</span>' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">
                        Kehadiran Siswa
                    </h3>
                </div>
                <div class="block-content p-1 bg-body-light">
                    <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <canvas id="chartjs-kehadiran" style="height: 290px"></canvas>
                </div>
                <div class="block-content">
                    <div class="row g-5 pt-0 mb-4">
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Hadir</div>
                                <div class="fs-1 fw-semibold text-success"><?= $total_hadir ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Sakit</div>
                                <div class="fs-1 fw-semibold text-info"><?= $total_sakit ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Izin</div>
                                <div class="fs-1 fw-semibold text-warning"><?= $total_izin ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Alfa</div>
                                <div class="fs-1 fw-semibold text-danger"><?= $total_alfa ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">
                        Penilaian Siswa
                    </h3>
                </div>
                <div class="block-content p-1 bg-body-light">
                    <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <canvas id="chartjs-penilaian" style="height: 290px"></canvas>
                </div>
                <div class="block-content">
                    <div class="row g-5 pt-0 mb-4">
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Jml Nilai</div>
                                <div class="fs-1 fw-semibold text-info"><?= $total_nilai ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Terendah</div>
                                <div class="fs-1 fw-semibold text-danger"><?= $kalkulasi[0] ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Tertinggi</div>
                                <div class="fs-1 fw-semibold text-success"><?= $kalkulasi[1] ?></div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Rerata</div>
                                <div class="fs-1 fw-semibold text-warning"><?= $kalkulasi[2] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-auto">
        <div class="col-12">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Catatan Perkembangan Siswa</h3>
                </div>
                <div class="block-content bg-light">
                    <ul class="timeline timeline-modern pull-t space-y-5 pb-5">
                        <?php foreach ($catatan as $c): ?>
                        <li class="timeline-event">
                            <div class="timeline-event-time pt-lg-0">
                                <?= ubah_tanggal($c->tanggal) ?>
                            </div>
                            <i class="timeline-event-icon fa fa-note-sticky bg-info"></i>
                            <div class="timeline-event-block pt-lg-0">
                                <?= $c->catatan ?? '<span class="fst-italic">Tidak ada catatan</span>' ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/chart.js/chart.umd.js') ?>

<script type="text/javascript">
! function() {
    class e {
        static initDashboardChartJS() {
            Chart.defaults.color = "#818d96",
            Chart.defaults.scale.grid.color = "transparent",
            Chart.defaults.scale.grid.zeroLineColor = "transparent",
            Chart.defaults.scale.display = !1,
            Chart.defaults.scale.beginAtZero = !0,
            Chart.defaults.elements.line.borderWidth = 2,
            Chart.defaults.elements.point.radius = 5,
            Chart.defaults.elements.point.hoverRadius = 7,
            Chart.defaults.plugins.tooltip.radius = 3,
            Chart.defaults.plugins.legend.display = !1;
            
            let e, t, a = document.getElementById("chartjs-kehadiran"),
                o = document.getElementById("chartjs-penilaian");
            null !== a && (e = new Chart(a, {
                type: "doughnut",
                data: {
                    labels: ["Hadir", "Sakit", "Izin", "Alfa"],
                    datasets: [
                        {
                            fill: !0,
                            data: [
                                <?= $total_hadir ?>,
                                <?= $total_sakit ?>,
                                <?= $total_izin ?>,
                                <?= $total_alfa ?>
                            ],
                            backgroundColor: [
                                "rgba(101, 163, 13, 1)",
                                "rgba(8, 145, 178, 1)",
                                "rgba(217, 119, 6, 1)",
                                "rgba(220, 38, 38, 1)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(101, 163, 13, .6)",
                                "rgba(8, 145, 178, .6)",
                                "rgba(217, 119, 6, .6)",
                                "rgba(220, 38, 38, .6)"
                            ]
                        }
                    ]
                },
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                }
            })), null !== o && (t = new Chart(o, {
                type: "line",
                data: {
                    labels: [<?php foreach($kalkulasi[3] as $k=>$v) {  echo '"Penilaian ke-' . $k+1 . '", '; } ?>],
                    datasets: [
                        {
                            fill: !0,
                            backgroundColor: "rgba(2, 132, 199, .45)",
                            borderColor: "rgba(2, 132, 199, 1)",
                            pointBackgroundColor: "rgba(2, 132, 199, 1)",
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(2, 132, 199, 1)",
                            data: [
                                <?php foreach($kalkulasi[3] as $v) { echo $v . ", "; } ?>
                            ]
                        },
                    ]
                },
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    tension: .4,
                    scales: {
                        y: {
                            suggestedMin: 0,
                            suggestedMax: 110
                        }
                    },
                    interaction: {
                        intersect: !1
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(e) {
                                    return "Nilai: " + e.parsed.y
                                }
                            }
                        }
                    }
                }
            }))
        }
        static init() {
            this.initDashboardChartJS();
        }
    }
    Codebase.onLoad((() => e.init()))
}();
</script>

<script>
    $(document).ready(function() {
        $('#tombol-cetak').on('click', function() {
            let canvas1 = document.getElementById('chartjs-kehadiran');
            let kehadiran = canvas1.toDataURL('image/png');
            let canvas2 = document.getElementById('chartjs-penilaian');
            let penilaian = canvas2.toDataURL('image/png');

            // Create a form
            let mapForm = document.createElement("form");
            mapForm.target = "_blank";
            mapForm.method = "POST";
            mapForm.action = "<?= route_to('admin.laporan.cetak') ?>";

            let mapInput0 = document.createElement("input");
            mapInput0.type = "hidden";
            mapInput0.name = "<?= csrf_token() ?>";
            mapInput0.value = "<?= csrf_hash() ?>";

            let mapInput1 = document.createElement("input");
            mapInput1.type = "hidden";
            mapInput1.name = "kehadiran";
            mapInput1.value = kehadiran;

            let mapInput2 = document.createElement("input");
            mapInput2.type = "hidden";
            mapInput2.name = "penilaian";
            mapInput2.value = penilaian;

            let mapInput3 = document.createElement("input");
            mapInput3.type = "hidden";
            mapInput3.name = "id_siswa";
            mapInput3.value = <?= $siswa->id_siswa ?>;

            let mapInput4 = document.createElement("input");
            mapInput4.type = "hidden";
            mapInput4.name = "id_kelas";
            mapInput4.value = <?= $kelas->id_kelas ?>;

            mapForm.appendChild(mapInput0);
            mapForm.appendChild(mapInput1);
            mapForm.appendChild(mapInput2);
            mapForm.appendChild(mapInput3);
            mapForm.appendChild(mapInput4);

            document.body.appendChild(mapForm);

            mapForm.submit();
        });
    });
</script>

<?= $this->endSection() ?>