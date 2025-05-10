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

    <?php
    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="' . base_url($style) . '">';
    }
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed kanit-extralight">
    <div class="wrapper">
        <?php $this->load->view($components['aside']); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูลวันทำงาน</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view($components['footer']); ?>
    </div>

    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
    <?php
    foreach ($scripts as $script) {
        echo '<script src="' . base_url($script) . '"></script>';
    }
    ?>
    <script>
        $(function() {
            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                locale: 'th',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                editable: true,
                eventResizableFromStart: true,
                droppable: true,
                allDaySlot: false,
                eventOverlap: function(stillEvent, movingEvent) {
                    return stillEvent.allDay && movingEvent.allDay;
                },
                dateClick: function(info) {
                    if (calendar.view.type === "dayGridMonth") {
                        return;
                    }

                    var clickedDate = info.dateStr;
                    var startTime = moment(clickedDate).startOf('hour').format('YYYY-MM-DDTHH:mm:ss');
                    var endTime = moment(startTime).add(30, 'minute').format('YYYY-MM-DDTHH:mm:ss');
                    let newEvent = {
                        title: "หยุดงาน",
                        start: startTime,
                        end: endTime,
                        backgroundColor: "#dc3545",
                        borderColor: "#dc3545"
                    };
                    calendar.addEvent(newEvent);

                    // $.ajax({
                    //     url: 'book/add',
                    //     method: 'POST',
                    //     data: {
                    //         date: date,
                    //         time_start: timeStart,
                    //         time_end: timeEnd
                    //     },
                    //     success: function(response) {
                    //         let newEvent = {
                    //             id: Date.now(),
                    //             title: "หยุด",
                    //             start: startDate,
                    //             end: endDate,
                    //             allDay: false,
                    //             backgroundColor: "red",
                    //             borderColor: "red"
                    //         };
                    //         calendar.addEvent(newEvent);

                    //         toastr.success("บันทึกข้อมูล");
                    //     },
                    //     error: function(xhr, status, error) {
                    //         console.error("Error saving event:", xhr.responseText);
                    //     }
                    // });
                },
            });
            calendar.render();
        })
    </script>
</body>

</html>