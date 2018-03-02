<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if(!isset($template['title'])){$title=siteinfo('name');}else{ $title = $template['title'];}?>
  <title><?=$title.' - '.siteinfo('name')?></title>
	<?= $template['partials']['meta']; ?> 
	<script>var baseUrl = "<?=base_url();?>";</script>

</head>

<body>
<!-- Hero -->
<div class="section section-hero bg-indigo-800" data-stellar-background-ratio="0">
	
	<!-- Second navbar -->
	<?php echo $template['partials']['navbar']; ?> 
	<!-- /second navbar -->
	<?php echo $template['partials']['slider']; ?> 

</div>
	


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">			
        

				<!-- screenshots -->
				<?php echo $template['partials']['body']; ?> 
				<!-- /screenshots -->


				<!-- Support -->
				 <!-- echo $template['partials']['support']; ?> -->
				<!-- /support -->


				<!-- services Why <?=siteinfo('name');?>? -->
				<!-- echo $template['partials']['services']; ?> -->
				<!--  /services/why <?=siteinfo('name');?>? -->


				<!-- Purchase and footer -->
				<div class="section bg-slate-800 has-footer" data-stellar-background-ratio="0">
					<!-- purchase -->
					<?php echo $template['partials']['purchase']; ?>
					
					<!-- /purchase -->
					<!-- footer -->
					<?php echo $template['partials']['footer']; ?>
					<!-- /footer -->
					
				</div>
				<!-- /purchase and footer -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
<?=theme_js("site.js",'frontend');?>
<?=theme_js("text_slider.js",'frontend');?>
  <script>
 
	window.sr = ScrollReveal();
	sr.reveal('.animatedParent',{reset: true, duration:1200});
	sr.reveal('.bar');
</script>
</html>
