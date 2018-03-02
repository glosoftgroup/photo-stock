<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- File limits -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">File limitations</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
	<img src="<?=img_url('addfiles.png');?>/addfiles.png" style='height: auto;width: 920px;'>
	<?php echo form_open_multipart('media/upload',"class='dropzone' id='dropzone"); ?>
	</form>
		<p class="content-group"></p>
        
		<p class="text-semibold">Upload media:</p>
		
	</div>
</div>
<!-- /file limits -->
<!-- Theme JS files -->
	<script type="text/javascript" src="<?=js_url();?>/plugins/uploaders/dropzone.min.js"></script>

	
	<script type="text/javascript" src="<?=js_url();?>/pages/uploader_dropzone.js"></script>
	<!-- /theme JS files -->