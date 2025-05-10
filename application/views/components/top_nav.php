<nav class="main-header navbar navbar-expand-md navbar-dark navbar-success">
    <div class="container">
        <a href="<?= site_url(); ?>" class="navbar-brand">
            <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">เอ๊ะถ่ายรูปอะไรดี</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">แพ็กเกจถ่ายภาพ</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ตารางคิวงาน</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ติดต่อเรา</a>
                </li>
            </ul>
        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php
            $logged_in = $this->session->userdata('logged_in');
            if (isset($logged_in)) {
            ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">สวัสดี <?= $logged_in["fname"] . " " . $logged_in["lname"]; ?></a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="<?= site_url('mybooked') ?>" class="dropdown-item">การจองของคุณ</a></li>
                        <li><a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#register" id="update-profile">ตั้งค่าบัญชี </a></li>
                        <li><a href="<?= base_url('logout'); ?>" class="dropdown-item">ออกจากระบบ</a></li>
                    </ul>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#login">
                        เข้าสู่ระบบ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#register" id="create-profile">
                        สมัครสมาชิก
                    </a>
                </li>
            <?php }  ?>
        </ul>
    </div>
</nav>

<div class="modal fade" id="login" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('login') ?>">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="register" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('register') ?>" id="register-form">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">รหัสผ่าน</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">ชื่อ</label>
                                    <input type="text" class="form-control" name="fname" id="fname" value="<?= set_value('fname') ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">นามสกุล</label>
                                    <input type="text" class="form-control" name="lname" id="lname" value="<?= set_value('lname') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel">เบอร์โทร</label>
                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-999-9"' data-mask name="tel" id="tel" value="<?= set_value('tel') ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" id="register-form-btn">สมัครสมาชิก</button>
                </div>
            </form>

        </div>
    </div>
</div>