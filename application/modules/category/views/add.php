<style type="text/css">
	label{
		font-weight: bold;
	}
</style>
<div class="content" id="vue-app">
	<div class="row">		
		<div class="col-md-12">
			<div class="panel">
			  <div class="panel-body">
				<!-- post form -->
				  <div class="col-md-12" id="app"></div>		         
		        <!-- ./end -->
		      </div>
			</div>
		</div>		
	</div>
</div>
<script type="text/javascript">
	var pk = false;
	var uploadUrl = baseUrl+'category/upload_file';
	var addUrl = baseUrl+'category/add';
</script>
<?php if(isset($pk)){ ?>
<script type="text/javascript">
	var pk = "<?=$pk;?>";
	uploadUrl = baseUrl+'category/upload_file/'+pk+'/';
	addUrl = baseUrl+'category/add/'+pk+'/';
</script>
<?php } ?>

<?=theme_js('plugins/forms/selects/select2.min.js');?>


<?=theme_js('category.bundle.js');?>





