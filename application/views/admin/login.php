<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เอ๊ะถ่ายรูปอะไรดี</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/AdminLTELogo.png'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/customs/css/fonts.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css') ?>">
</head>

<body class="hold-transition login-page kanit-extralight">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('admin') ?>"><b>เอ๊ะ</b>ถ่ายรูปอะไรดี</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="<?= base_url('admin/login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= site_url(); ?>" class="btn btn-block btn-outline-secondary">เยี่ยมชมหน้าเว็บไซต์</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn bg-gradient-primary btn-block">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
    <script>
        <?php if ($this->session->flashdata('error')): ?>
            toastr.error('<?php echo $this->session->flashdata('error') ?>')
        <?php endif; ?>
        <?php if ($this->session->flashdata('ok')): ?>
            toastr.success('<?php echo $this->session->flashdata('ok') ?>')
        <?php endif; ?>
    </script>
</body>

</html>