<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title;?></title>
	<?= $template['partials']['meta']; ?>

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
  <?=theme_css('custom.css');?>
	

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
  <?=theme_js("plugins/slimscroll/jquery.slimscroll.min.js");?>
	<?=theme_js("plugins/list/list.min.js");?>
	<?=theme_js("plugins/ui/moment/moment.min.js");?>
  <?=theme_js("plugins/forms/styling/uniform.min.js");?>

	<?=theme_js("core/app.js");?>
	<?=theme_js("pages/layout_navbar_secondary_fixed.js");?>
	<?=theme_js('core/navbar-elements.js');?>
	<!-- /theme JS files -->
	<!-- customjs -->
	<?=theme_js('sms/sms.js');?>
<script>

	 // Initialize on button click
	 $('.btn').click(function () {
			var btn = $(this);
			btn.button('loading')
			setTimeout(function () {
				btn.button('reset')
			}, 3000)
		});

		// Button with spinner
		
    $('.btn').on('click', function() {
        var light_4 = $(this).parent();
        $(light_4).block({
            message: '<i class="icon-spinner4 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
        window.setTimeout(function () {
            $(light_4).unblock();
        }, 200);
    });
    </script>

  
	

</head>

<body class="sidebar-xs navbar-top-md-xs">
  <!-- Multiple navbars wrapper -->
	<div class="navbar-fixed-top"  id="bod" data-bas="<?=base_url();?>">
	<!-- Main navbar -->
  <?= $template['partials']['top']; ?>
	<!-- /main navbar -->


	<!-- Second navbar -->
	<?php echo $template['partials']['navbar']; ?>
	<!-- /second navbar -->
  </div>

	

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
