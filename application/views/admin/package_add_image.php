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
                            <h1 class="m-0">
                                เพิ่มรูปภาพแพ็กเกจ :
                                <?= $data["package_name"]; ?>
                            </h1>
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
                                <div class="card-body">
                                    <div id="actions" class="row">
                                        <div class="col-lg-6">
                                            <div class="btn-group w-100">
                                                <span class="btn btn-success col fileinput-button">
                                                    <i class="fas fa-plus"></i>
                                                    <span>เพิ่มรูปแพ็กเกจ</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center">
                                            <div class="fileupload-process w-100">
                                                <div id="total-progress" class="progress progress-striped active" role="progressbar"
                                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table table-striped files" id="previews">
                                        <div id="template" class="row mt-2">
                                            <div class="col-auto">
                                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="lead" data-dz-name></span>
                                                    (<span data-dz-size></span>)
                                                </p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0"
                                                    aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary start">
                                                        <i class="fas fa-star"></i>
                                                        <span>ใช้เป็นรูปหลัก</span>
                                                    </button>
                                                    <button type="button" data-dz-remove class="btn btn-danger delete">
                                                        <i class="fas fa-trash"></i>
                                                        <span>ลบ</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
    <?php
    foreach ($scripts as $script) {
        echo '<script src="' . base_url($script) . '"></script>';
    }
    ?>
    <script>
        package_id = <?= $data["id"]; ?>;

        Dropzone.autoDiscover = false

        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, {
            url: "<?= base_url('admin/package/upload/image') ?>",
            params: {
                package_id: package_id,
            },
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: true,
            previewsContainer: "#previews",
            clickable: ".fileinput-button"
        })

        myDropzone.on("success", function(file, response) {
            var res = JSON.parse(response);
            if (res.success) {
                toastr.success(res.success);
                $(file.previewElement).find(".start").attr("data-image-id", res.image_id);
                $(file.previewElement).find(".delete").attr("data-image-id", res.image_id);
            } else {
                toastr.error(res.error);
            }
        });

        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            document.querySelector("#total-progress").style.opacity = "1"
        })

        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        $(document).on("click", ".start, .delete", function() {
            var imageId = $(this).data("image-id");
            $.ajax({
                url: "<?= base_url('admin/package/image/main') ?>",
                method: "POST",
                data: {
                    package_id: package_id,
                    image_id: imageId
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        toastr.success(res.success);
                    } else {
                        toastr.error(res.error);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('เกิดข้อผิดพลาด: ' + error);
                }
            });
        });

        myDropzone.on("removedfile", function(file) {
            var imageId = $(file.previewElement).find(".delete").data("image-id");

            $.ajax({
                url: "<?= base_url('admin/package/image/delete') ?>",
                method: "POST",
                data: {
                    image_id: imageId
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        toastr.success(res.success);
                    } else {
                        toastr.error(res.error);
                        myDropzone.emit("addedfile", file);
                        myDropzone.emit("thumbnail", file, file.dataURL);

                        $(file.previewElement).find("img").css({
                            "width": "80px",
                            "height": "80px"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('เกิดข้อผิดพลาด: ' + error);
                    myDropzone.emit("addedfile", file);
                    myDropzone.emit("thumbnail", file, file.dataURL);

                    $(file.previewElement).find("img").css({
                        "width": "80px",
                        "height": "80px"
                    });
                }
            });
        });
    </script>
</body>

</html>