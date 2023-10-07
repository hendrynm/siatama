<?= $this->extend('admin/_layout/master') ?>

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
                        <a href="<?= route_to('admin.laporan.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
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
        <div class="col-12 col-lg-5">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fs-4 fw-semibold">Hendry Naufal Marbella</div>
                        <div class="fs-sm fw-medium text-muted">SMPN 1 Surabaya</div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-user-graduate fa-2x opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fw-medium fs-sm">
                            Kelas
                        </div>
                        <div class="fw-semibold fs-2" style="line-height: 1">
                            20
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fs-5 fw-semibold text-info">SMP</div>
                        <div class="fw-semibold text-primary">Kelas 8</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="block">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                    <div class="text-start">
                        <div class="fs-sm fw-medium text-muted">Tentor</div>
                        <div class="fs-5 fw-semibold">Ening Tri Ayu</div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-chalkboard-user fa-2x opacity-25"></i>
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
                                <div class="fs-1 fw-semibold text-success">16</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Sakit</div>
                                <div class="fs-1 fw-semibold text-info">2</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Izin</div>
                                <div class="fs-1 fw-semibold text-warning">1</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Alfa</div>
                                <div class="fs-1 fw-semibold text-danger">1</div>
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
                                <div class="fs-1 fw-semibold text-info">5</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Terendah</div>
                                <div class="fs-1 fw-semibold text-danger">75</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center border-end">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Tertinggi</div>
                                <div class="fs-1 fw-semibold text-success">90</div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 text-center">
                            <div>
                                <div class="fs-sm fw-medium text-uppercase text-muted">Rerata</div>
                                <div class="fs-1 fw-semibold text-warning">84.5</div>
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
                        <li class="timeline-event">
                            <div class="timeline-event-time pt-lg-0">
                                Senin, 12 Agustus 2023
                            </div>
                            <i class="timeline-event-icon fa fa-note-sticky bg-info"></i>
                            <div class="timeline-event-block pt-lg-0">
                                Ananda sudah mengerjakan tugas dengan baik.
                            </div>
                        </li>
                        <li class="timeline-event">
                            <div class="timeline-event-time pt-lg-0">
                                Sabtu, 8 Agustus 2023
                            </div>
                            <i class="timeline-event-icon fa fa-note-sticky bg-info"></i>
                            <div class="timeline-event-block pt-lg-0">
                                Ananda tidak hadir.
                            </div>
                        </li>
                        <li class="timeline-event">
                            <div class="timeline-event-time pt-lg-0">
                                Senin, 1 Agustus 2023
                            </div>
                            <i class="timeline-event-icon fa fa-note-sticky bg-info"></i>
                            <div class="timeline-event-block pt-lg-0">
                                Ananda mengerjakan PR, tetapi tidak paham pada bagian Persamaan Linier. Ananda akan mengikuti les privat tambahan pada hari Sabtu.
                            </div>
                        </li>
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
                            data: [16, 2, 1, 1],
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
                    labels: ["Penilaian ke-1", "Penilaian ke-2", "Penilaian ke-3", "Penilaian ke-4", "Penilaian ke-5"],
                    datasets: [
                        {
                            fill: !0,
                            backgroundColor: "rgba(2, 132, 199, .45)",
                            borderColor: "rgba(2, 132, 199, 1)",
                            pointBackgroundColor: "rgba(2, 132, 199, 1)",
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "rgba(2, 132, 199, 1)",
                            data: [75, 84, 90, 80, 85]
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

            mapForm.appendChild(mapInput0);
            mapForm.appendChild(mapInput1);
            mapForm.appendChild(mapInput2);

            document.body.appendChild(mapForm);

            mapForm.submit();
        });
    });
</script>

<?= $this->endSection() ?>