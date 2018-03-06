<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title.' &dash; '.siteinfo('name');?></title>
	<?= $template['partials']['meta']; ?>
	<script> var baseUrl = "<?=base_url();?>";</script>
	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
	<?=theme_css('icons/icomoon/styles.css');?>
    <?=theme_css("bootstrap.css");?>
	<?=theme_css("hover.css",'frontend');?>
  	<?=theme_css("extras/animate.min.css");?>
	<?=theme_css("core.css");?>
	<?=theme_css("components.css");?> 
	<?=theme_css("colors.css");?>
  	<!-- /global stylesheets -->
    <!-- Core JS files -->
	<?=theme_js("core/libraries/jquery.min.js");?>
	<?=theme_js("core/libraries/bootstrap.min.js");?>
	<?=theme_js("plugins/ui/nicescroll.min.js");?>
	<?=theme_js("plugins/ui/drilldown.js");?>
	<!-- /core JS files -->
		
	<!-- Theme JS files -->
	<?=theme_js("plugins/buttons/hover_dropdown.min.js");?>
	<?=theme_js("plugins/ui/jquery-validation/jquery.validate.js");?>
	<?=theme_js("plugins/notifications/jgrowl.min.js");?>
	<?=theme_js('plugins/loaders/blockui.min.js');?>
	<?=theme_js("plugins/ui/moment/moment.min.js");?>
	 <?=theme_js("plugins/forms/styling/uniform.min.js");?>

	<?=theme_js("core/app.js");?>
			

</head>

<body>
<!-- <body class="sidebar-xs navbar-top-md-xs"> -->
  
    <?=$template['partials']['top']; ?>
	<!-- /main navbar -->



	

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">		
			 <?php echo $template['partials']['sidebar']; ?>
			 <?php echo $template['partials']['breadcrumb'];?>
			 <?php echo $template['body']; ?>
		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
  <?php echo $template['partials']['footer']; ?>
	<!-- /footer -->

</body>
</html>
