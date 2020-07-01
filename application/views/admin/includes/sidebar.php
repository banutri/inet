<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin - <?php echo ucfirst($title); ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
		type="text/css">


	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('sbadmin/css/addtional.css') ?>" rel="stylesheet">

	<!-- buat tabel -->
	<?php 
    if($title=='barang'){
	  echo 
	  '<link href="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css').'" rel="stylesheet">
	  
	  ';
	}
	if($title=='pesanan'){
		echo 
		'<link href="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css').'" rel="stylesheet">
		
		';
	  }
	  if($title=='pembayaran'){
		echo 
		'<link href="'.base_url('sbadmin/vendor/datatables/dataTables.bootstrap4.min.css').'" rel="stylesheet">
		
		';
	  }
  ?>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-image" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-rss"></i>
				</div>
				<div class="sidebar-brand-text mx-3">iNet Shop</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if($title=='dashboard'){echo 'active';} ?>">
				<a class="nav-link" href="<?php echo base_url('admin'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item <?php if($title=='barang'){echo 'active';} ?>">
				<a class="nav-link" href="<?php echo base_url('admin/barang') ?>">
					<i class="fas fa-box-open"></i>
					<span>Kelola Barang</span>
				</a>

			</li>

			


			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->