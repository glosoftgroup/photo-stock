<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<?php if(!isset($template['title'])){$title=siteinfo('name');}else{ $title = $template['title'];}?>
  <title><?=$title.' - '.siteinfo('name')?></title>
	<script>var baseUrl = "<?=base_url();?>";</script>

	<!-- meta -->
	<?php echo $template['partials']['meta']; ?>
	
	<!-- ./meta -->
</head>

<body class="my-account">
<div class="wrapper">
	<!--===================== Header ========================-->
	<?php echo $template['partials']['navbar']; ?> 
	<!--===================== End of Header ========================-->
	<!--===================== Base Slider ========================-->
		<!--===================== End of Base Slider ========================-->
	
	<!-- body -->
	<?php echo $template['body']; ?>
	<!-- ./body -->

	<!--===================== Footer ========================-->
	<?php echo $template['partials']['footer']; ?>
	<!--===================== End of Footer ========================-->
</div><!--wrapper-->
<?=theme_js('lib/jquery.js','frontend');?>
<?=theme_js('lib/bootstrap.min.js','frontend');?>
<?=theme_js('lib/owl.carousel.min.js','frontend');?>
<?=theme_js('lib/css3-animate-it.js','frontend');?>
<?=theme_js('lib/counter.js','frontend');?>
<?=theme_js('main.js','frontend');?>

<script type="text/javascript">
$(function(){

  $(".input-group-btn .dropdown-menu li a").click(function(){

    var selText = $(this).html();

    //working version - for single button //
   //$('.btn:first-child').html(selText+'<span class="caret"></span>');  
   
   //working version - for multiple buttons //
   $(this).parents('.input-group-btn').find('.btn-search').html(selText);
   });
});
</script>
</body>
</html>
