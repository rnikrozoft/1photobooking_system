<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เอ๊ะถ่ายรูปอะไรดี</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customs/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fullcalendar/main.css') ?>">
</head>

<body class="hold-transition layout-top-nav kanit-light">
    <div class="wrapper">
        <?php $this->load->view($components['topnav']); ?>
        <div class="content-wrapper">
            <div class="content">
                <section class="py-5">
                    <div class="container">
                        <h1>ค้นหาคิวช่างภาพ</h1>
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">โปรดเลือกวันที่ เพื่อค้นหาคิวช่างภาพ</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>เลือกวันที่</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <section class="py-5 bg-white">
                    <div class="container">
                        <h1>ตารางคิวงานช่างภาพ</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-2 bg-gradient-dark">
                                    <img class="card-img-top" src="https://placehold.co/600x400" alt="">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title text-primary text-white">name</h5>
                                        <p class="card-text text-white pb-2 pt-1">detail</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
            </div>
        </div>
        <?php $this->load->view($components['footer']); ?>
    </div>
    <div class="modal fade" id="calendarModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="calendar"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" id="book-summary">สรุปการจอง</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-timezone@0.5.34/builds/moment-timezone-with-data.js"></script>
    <script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/fullcalendar/main.js'); ?>"></script>

    <script>
        $(function() {
            var calendar;

            $('#reservation').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY',
                    applyLabel: 'ตกลง',
                    cancelLabel: 'ยกเลิก',
                    fromLabel: 'จาก',
                    toLabel: 'ถึง',
                    customRangeLabel: 'กำหนดเอง',
                    daysOfWeek: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
                    monthNames: [
                        'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                    ],
                    firstDay: 0
                },
                isInvalidDate: function(date) {
                    return date.day() === 0 || date.day() === 6;
                },
                maxSpan: {
                    days: 5
                },
                minDate: moment()
            });

            $('#reservation').on('apply.daterangepicker', function(ev, picker) {
                var startDate = convertDateFormat(picker.startDate.format('DD/MM/YYYY'));
                var endDate = convertDateFormat(moment(picker.endDate).add(1, 'days').format('DD/MM/YYYY'));

                if (calendar) {
                    calendar.destroy();
                }

                var calendarEl = document.getElementById('calendar');
                calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'th',
                    initialView: 'timeGridWeek',
                    initialDate: startDate,
                    validRange: {
                        start: startDate,
                        end: endDate
                    },
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: ''
                    },
                    themeSystem: 'bootstrap',
                    events: [],
                    editable: true,
                    eventResizableFromStart: true,
                    droppable: true,
                    allDaySlot: false,
                    eventOverlap: function(stillEvent, movingEvent) {
                        return stillEvent.allDay && movingEvent.allDay;
                    },
                    dateClick: function(info) {
                        var clickedDate = info.dateStr;
                        var startTime = moment(clickedDate).startOf('hour').format('YYYY-MM-DDTHH:mm:ss');
                        var endTime = moment(startTime).add(30, 'minute').format('YYYY-MM-DDTHH:mm:ss');
                        let newEvent = {
                            title: "ทำการจอง",
                            start: startTime,
                            end: endTime,
                        };
                        calendar.addEvent(newEvent);
                    }
                });

                $("#calendarModal").modal('show').on('shown.bs.modal', function() {
                    calendar.render();
                });

                $("#book-summary").click(function() {
                    var events = calendar.getEvents();
                    var eventsData = [];

                    events.forEach(function(event) {
                        var startDate = moment(event.start).tz('Asia/Bangkok').format('YYYY-MM-DDTHH:mm:ss'); // แปลงเป็นเวลาของประเทศไทย
                        var endDate = moment(event.end).tz('Asia/Bangkok').format('YYYY-MM-DDTHH:mm:ss')

                        eventsData.push({
                            startDate: startDate,
                            endDate: endDate
                        });
                    });

                    var form = $('<form>', {
                        "method": "POST",
                        "action": "<?= base_url('book/summary') ?>"
                    });

                    form.append($('<input>', {
                        "type": "hidden",
                        "name": "eventsData",
                        "value": JSON.stringify(eventsData)
                    }));

                    form.appendTo('body');
                    form.submit();
                });
            });
        });

        function convertDateFormat(dateStr) {
            return moment(dateStr, 'DD/MM/YYYY').format('YYYY-MM-DD');
        }
    </script>
</body>

</html>