<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เอ๊ะถ่ายรูปอะไรดี</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customs/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">

</head>

<body class="hold-transition sidebar-mini layout-fixed kanit-extralight">
    <div class="wrapper">
        <?php $this->load->view($components['aside']); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ข้อมูลแพ็กเกจ</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/package/add') ?>" class="btn btn-sm bg-gradient-primary">เพิ่มข้อมูล</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ข้อมูลแพ็กเกจทั้งหมดในระบบ</h3>
                                </div>
                                <div class="card-body">
                                    <table id="book" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>รหัสแพ็กเกจ</th>
                                                <th>ชื่อแพ็กเกจ</th>
                                                <th>เรตราคาต่อชั่วโมง</th>
                                                <th>การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($packages as $package) { ?>
                                                <tr>
                                                    <td><?= $package["id"] ?></td>
                                                    <td><?= $package["package_name"] ?></td>
                                                    <td><?= $package["package_rate"] ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning">แก้ไข</a>
                                                        <button type="button" class="btn btn-danger delete" data-id="<?= $package["id"]; ?>">ลบ</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>

    <script>
        $(function() {
            $("#book").DataTable({
                "responsive": true,
                "autoWidth": true,
                "language": {
                    "sProcessing": "กำลังดำเนินการ...",
                    "sLengthMenu": "แสดง _MENU_ รายการ",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                    "sInfoFiltered": "(กรองข้อมูลจากทั้งหมด _MAX_ รายการ)",
                    "sSearch": "ค้นหา:",
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "หน้าสุดท้าย"
                    }
                }
            });

            $(document).on("click", ".delete", function() {
                var packageId = $(this).data("id");
                var row = $(this).closest("tr"); // หาแถวที่ต้องการลบ

                Swal.fire({
                    text: "ข้อมูลแพ็กเกจ และรูปภาพจะหายไป",
                    title: "ลบแพ็กเกจรหัส " + packageId + ", แน่ใจหรือไม่ ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ใช่, ลบข้อมูล",
                    cancelButtonText: "ยกเลิก",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('admin/package/delete') ?>",
                            method: "POST",
                            data: {
                                package_id: packageId
                            },
                            success: function(response) {
                                var res = JSON.parse(response);
                                if (res.success) {
                                    toastr.success(res.success);

                                    var datatable = $("#book").DataTable(); // เปลี่ยนเป็น ID ของ DataTable จริง ๆ
                                    datatable.row(row).remove().draw();
                                } else {
                                    toastr.error(res.error);
                                }
                            },
                            error: function(xhr, status, error) {
                                toastr.error("เกิดข้อผิดพลาด: " + error);
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>