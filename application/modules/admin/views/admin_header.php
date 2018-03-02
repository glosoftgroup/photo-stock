<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title;?> | <?=siteinfo('name');?></title>

	<!-- Global stylesheets -->
	<?php $this->load->view("admin/templates/stylesheets");?>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<?php $this->load->view('admin/templates/javascript');?>
	<!-- /core JS files -->

	

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<?php $this->load->view('admin/templates/main_navbar');?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

		<?php $this->load->view('admin/templates/main_sidebar');?>