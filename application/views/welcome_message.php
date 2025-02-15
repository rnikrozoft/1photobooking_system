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

<body class="hold-transition layout-top-nav kanit-light">
    <div class="wrapper">
        <?php $this->load->view($components['topnav']); ?>
        <div class="content-wrapper">
            <div class="content-header bg-white">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://placehold.co/1200x400" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <section class="py-5">
                    <div class="container">
                        <h1>แพ็กเกจถ่ายภาพ</h1>
                        <div class="row">
                            <?php for ($i = 0; $i < 3; $i++) { ?>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <a href="#">
                                        <div class="card mb-2 bg-gradient-dark">
                                            <img class="card-img-top" src="https://placehold.co/600x400" alt="">
                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <h5 class="card-title text-primary text-white">name</h5>
                                                <p class="card-text text-white pb-2 pt-1">detail</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <section class="py-5 bg-white">
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
                </section>
            </div>
        </div>
        <?php $this->load->view($components['footer']); ?>
    </div>
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
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