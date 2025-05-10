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
                            <h1 class="m-0">ข้อมูลผู้ใช้งาน</h1>
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
                                    <h3 class="card-title">ข้อมูลผู้ใช้งานทั้งหมดในระบบ</h3>
                                </div>
                                <div class="card-body">
                                    <table id="users" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ชื่อผู้ใช้</th>
                                                <th>ชื่อจริง</th>
                                                <th>นามสกุล</th>
                                                <th>เบอร์โทร</th>
                                                <th>บทบาท</th>
                                                <th>การจัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($users as $user) {
                                            ?>
                                                <tr>
                                                    <td class="username"><?= $user["username"] ?></td>
                                                    <td class="fname"><?= $user["fname"] ?></td>
                                                    <td class="lname"><?= $user["lname"] ?></td>
                                                    <td class="tel"><?= $user["tel"] ?></td>
                                                    <td class="role">
                                                        <?php
                                                        if ($user["role"] == "photographer") {
                                                            echo "ช่างภาพ";
                                                        } else {
                                                            echo "ลูกค้า";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning edit" data-toggle="modal" data-target="#edit-user">แก้ไข</a>
                                                        <button type="button" class="btn btn-danger delete" data-username="<?= $user["username"]; ?>">ลบ</button>
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

    <div class="modal fade" id="edit-user" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= site_url('admin/user/update') ?>">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="username">ชื่อผู้ใช้งาน</label>
                                        <input type="text" class="form-control" name="username" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tel">เบอร์โทร</label>
                                    <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-999-9"' data-mask name="tel">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fname">ชื่อ</label>
                                        <input type="text" class="form-control" name="fname">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lname">นามสกุล</label>
                                        <input type="text" class="form-control" name="lname">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
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
        <?php if ($this->session->flashdata('error')): ?>
            toastr.error('<?php echo $this->session->flashdata('error') ?>')
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            toastr.success('<?php echo $this->session->flashdata('success') ?>')
        <?php endif; ?>
    </script>
    <script>
        $(function() {
            $("#users").DataTable({
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
                var username = $(this).data("username");
                var row = $(this).closest("tr");
                Swal.fire({
                    title: "ลบผู้ใช้ " + username + ", แน่ใจหรือไม่ ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ใช่, ลบข้อมูล",
                    cancelButtonText: "ยกเลิก",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('admin/user/delete') ?>",
                            method: "POST",
                            data: {
                                username: username
                            },
                            success: function(response) {
                                var res = JSON.parse(response);
                                if (res.success) {
                                    toastr.success(res.success);

                                    var datatable = $("#users").DataTable();
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

            $(".edit").on("click", function() {
                var row = $(this).closest("tr");
                var username = row.find(".username").text().trim();
                var fname = row.find(".fname").text().trim();
                var lname = row.find(".lname").text().trim();
                var tel = row.find(".tel").text().trim();
                $("#edit-user input[name='username']").val(username);
                $("#edit-user input[name='fname']").val(fname);
                $("#edit-user input[name='lname']").val(lname);
                $("#edit-user input[name='tel']").val(tel);
            });
        });
    </script>
</body>

</html>