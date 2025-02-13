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
        </ul>
    </div>
</nav>