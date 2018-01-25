<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf=8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/ionicons.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/AdminLTE.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/admin_style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/_all-skins.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/jquery-ui.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>admin/bootstrap3-wysihtml5.min.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-green sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="index2.html" class="logo">
				<span class="logo-mini"><b>E</b>AD</span>
				<span class="logo-lg"><b>Ersao</b>ADMIN</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li <?php if($this->uri->segment(2) == 'media'){ echo "class='active'";}?>><a href=<?=BASE_URL."admin/media"?>><i class="fa fa-image"></i><span>Media Gallery</span></a></li>
					<li <?php if($this->uri->segment(2) == 'events'){ echo "class='active'";}?>><a href=<?=BASE_URL."admin/events"?>><i class="fa fa-calendar"></i><span>Events</span></a></li>
					<li <?php if($this->uri->segment(2) == 'branch'){ echo "class='active'";}?>><a href=<?=BASE_URL."admin/branch"?>><i class="fa fa-dashboard"></i><span>Branch</span></a></li>
					<li <?php if($this->uri->segment(2) == 'menu'){ echo "class='active'";}?>><a href=<?=BASE_URL."admin/menus"?>><i class="fa fa-navicon"></i><span>Menu Items</span></a></li>
					<li <?php if($this->uri->segment(2) == 'orders'){ echo "class='active'";}?>><a href=<?=BASE_URL."admin/orders"?>><i class="fa fa-dashboard"></i><span>Orders</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
