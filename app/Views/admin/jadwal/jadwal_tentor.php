<?= $this->extend('admin/_layout/master') ?>

<?= $this->section('menu') ?>
Jadwal Les
<?= $this->endSection() ?>

<?= $this->section('submenu') ?>
Jadwal Tentor
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="block block-bordered">
        <div class="block-header bg-primary px-4 d-flex">
            <a href="<?= url_to('admin.jadwal.index') ?>" class="fa fa-arrow-circle-left text-white fs-3"></a>
            <span class="ms-3 me-auto text-white fs-5 fw-semibold">Jadwal Tentor</span>
        </div>
        
        <div class="block-content">
            <div class="row pb-4">
                <div class="col-12 d-block d-lg-none text-center">
                    <div class="fw-semibold text-danger fs-1">Layar Terlalu Kecil!</div>
                    <div class="fw-medium fs-4 text-primary mt-5">Mohon gunakan Laptop atau Tablet untuk melihat jadwal!</div>
                    <div class="fs-6 text-muted mt-5">Kami mohon maaf atas ketidaknyamanannya.</div>
                </div>
                <div class="col-12 d-none d-lg-block">
                    <!-- Calendar Container -->
                    <div id="js-calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag('src/assets/js/lib/jquery.min.js') ?>
<?= script_tag('src/assets/js/plugins/fullcalendar/index.global.min.js') ?>
<?= script_tag('src/assets/js/plugins/fullcalendar/scheduler.index.global.min.js') ?>
<?= script_tag('src/assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>

<script type="text/javascript">
    let sa = Swal.mixin({
        buttonsStyling: !1,
        target: "#page-container",
        customClass: {
            confirmButton: "btn btn-alt-primary m-1",
            cancelButton: "btn btn-alt-danger m-1",
            input: "form-control"
        }
    });
    
    class CalendarManager {
        constructor() {
            this.calendar = null;
        }

        initCalendar() {
            const calendarEl = document.getElementById('js-calendar');
            let sekarang = new Date();
            let waktu = sekarang.toTimeString({timeStyle: 'long'});

            this.calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                height: '500px',
                themeSystem: 'standard',
                initialView: 'resourceTimeline',
                resourceAreaWidth: '20%',
                resourceOrder: 'title',
                slotMinWidth: 25,
                dayMinWidth: 100,
                slotDuration: '00:15:00',
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false
                },
                allDaySlot: false,
                stickyHeaderDates: true,
                nowIndicator: true,
                scrollTime: waktu,
                locale: 'id',
                firstDay: 0,
                editable: false,
                droppable: false,
                headerToolbar: {
                    right: 'prev,today,next',
                    center: 'title',
                    left: 'resourceTimeline,resourceTimeGridDay,resourceTimeGridWeek'
                },
                buttonText: {
                    today: 'Sekarang',
                    resourceTimeline: 'Linimasa',
                    resourceTimeGridDay: 'Hari',
                    resourceTimeGridWeek: 'Minggu'
                },
                businessHours: [
                    {
                        daysOfWeek: [ 1, 2, 3, 4, 5 ],
                        startTime: '12:00',
                        endTime: '20:45'
                    },
                    {
                        daysOfWeek: [ 6, 0 ],
                        startTime: '08:00',
                        endTime: '20:45'
                    }
                ],
                resources: [
                    <?php foreach ($tentor as $v): ?>
                    {
                        id: "<?= $v->id_pengajar ?>",
                        title: "<?= $v->nama_pengajar ?>"
                    },
                    <?php endforeach; ?>
                ],
                events: [
                    <?php foreach($jadwal as $v): ?>
                    {
                        id: <?= $v->id_jadwal ?>,
                        resourceId: "<?= $v->id_pengajar ?>",
                        start: "<?= $v->tanggal ?>",
                        end: "<?= $v->selesai ?>",
                        <?php
                        if($v->id_kelas == 0)
                        {
                            echo 'title: "Tersedia",';
                            echo 'color: "#01a875",';
                            echo 'display: "background",';
                        }
                        else
                        {
                            echo 'title: "Kelas ' . $v->nama_kelas . '",';
                            echo 'color: "#30b4d5",';
                        }
                        ?>
                    },
                    <?php endforeach; ?>
                ],
                eventClick: function(info) {
                    let resource = info.event.getResources();
                    let resourceTitle = resource[0].title;

                    let startDate = info.event.start;
                    let endDate = info.event.end;

                    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                    const dayName = days[startDate.getDay()];

                    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    const monthName = months[startDate.getMonth()];

                    let formattedStartDate = `${dayName}, ${startDate.getDate()} ${monthName} ${startDate.getFullYear()} pukul ${startDate.getHours()}:${('0' + startDate.getMinutes()).slice(-2)}`;
                    let formattedEndDate = `${endDate.getHours()}:${('0' + endDate.getMinutes()).slice(-2)}`;

                    sa.fire({
                        icon: 'info',
                        title: info.event.title + ' - ' + resourceTitle,
                        html: '<div class="">' + formattedStartDate + ' - ' + formattedEndDate + '</div>',
                        showCancelButton: false,
                        confirmButtonText: 'Tutup',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            confirmButton: 'btn btn-alt-primary m-1',
                            cancelButton: 'btn btn-alt-danger m-1',
                        },
                    });
                },
            });

            this.calendar.render();
        }
    }

    const calendarManager = new CalendarManager();
    calendarManager.initCalendar();
</script>
<?= $this->endSection() ?>
