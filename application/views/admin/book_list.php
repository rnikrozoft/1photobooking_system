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
</head>

<body class="hold-transition sidebar-mini layout-fixed kanit-extralight">
	<div class="wrapper">
		<?php $this->load->view($components['aside']); ?>
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">ข้อมูลการจอง</h1>
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
									<h3 class="card-title">ข้อมูลการจองการจองทั้งหมดในระบบ</h3>
								</div>
								<div class="card-body">
									<table id="book" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th>Engine version</th>
												<th>CSS grade</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Trident</td>
												<td>Internet
													Explorer 4.0
												</td>
												<td>Win 95+</td>
												<td> 4</td>
												<td>X</td>
											</tr>
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

		});
	</script>
</body>

</html>