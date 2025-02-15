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
                            <h1 class="m-0">เพิ่มแพ็กเกจ</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/package/list'); ?>" class="btn btn-sm bg-gradient-secondary">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-12">
                            <div class="card">
                                <form action="<?= site_url('admin/package/insert'); ?>" method="POST">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>ชื่อแพ็กเกจ</label>
                                                    <input type="text" class="form-control" name="package_name">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>เรทราคาต่อชั่วโมง</label>
                                                    <input type="number" class="form-control" name="package_rate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>รายละเอียด</label>
                                            <textarea class="form-control" rows="3" name="package_detail"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-sm bg-gradient-primary">เพิ่มข้อมูล</button>
                                    </div>
                                </form>
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
    <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
    <script>
        <?php if ($this->session->flashdata('error')): ?>
            toastr.error('<?php echo $this->session->flashdata('error') ?>')
        <?php endif; ?>
    </script>
</body>

</html>