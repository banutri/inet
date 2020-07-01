<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>iNet Shop - <?php echo ucfirst($title); ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
		type="text/css">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('sbadmin/css/shop-homepage.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('sbadmin/css/cl/addtional.css') ?>" rel="stylesheet">

	

	<!-- id pengunjung -->



</head>

<body class="h-100">

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-navbar shadow topbar mb-4 fixed-top">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url('assets/img/logo/inet.svg') ?>" alt="">
		</a>



		<!-- Topbar Navbar -->
		<!-- Topbar Navbar -->
		<div class="usr-box bg-info ">

			<ul class="navbar-nav ml-auto">

				<!-- Nav Item - User Information -->
				<?php 
						$data_pesanan = $this->session->userdata('data_pesanan'); ?>
				<?php	if($data_pesanan['no_pesanan'] !=NULL){ ?>
				<li class="nav-item dropdown no-arrow ">
					<a class="nav-link-ku dropdown-toggle text-decoration-none" href="<?php echo base_url('customer/pesanan'); ?>"
						>
						<span class="mr-2 d-none d-lg-inline text-light">


						<span>Pesanan</span> <i class="fas fa-arrow-right"></i>



						</span>

					</a>
					<!-- Dropdown - User Information -->
					</li>
				<?php } ?>
				<li class="nav-item dropdown no-arrow ">
				<?php if($data_pesanan['no_pesanan']==NULL){ ?>
					<a class="nav-link-ku dropdown-toggle text-decoration-none" href="<?php echo '#'; ?>"
						id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-light">


						<span>Halo, Pelanggan</span>



						</span>

					</a>
				<?php } ?>
				</li>

			</ul>
		</div>




	</nav>
	<!-- End of Topbar -->