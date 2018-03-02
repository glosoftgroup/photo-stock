<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if(!isset($title)){$title=siteinfo('name');}?>
  <title><?=$template['title'];?></title>

	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
  <?=theme_css("icons/icomoon/styles.css",'frontend');?>
	<?=theme_css("bootstrap.css",'frontend');?>
	<?=theme_css("slider.css",'frontend');?>
  <?=theme_css("core.css",'frontend');?>
  <?=theme_css("animate.css",'frontend');?>
	<?=theme_css("hover.css",'frontend');?>
	<?=theme_css("components.css",'frontend');?>
	<?=theme_css("colors.css",'frontend');?>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<?=theme_js("jquery.min.js",'frontend');?>
	<?=theme_js("jquery.stellar.min.js",'frontend');?>
  <?=theme_js("bootstrap.min.js",'frontend');?>
</head>
