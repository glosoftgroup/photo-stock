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
	var uploadUrl = baseUrl+'post/upload_file';
</script>
<?php if(isset($pk)){ ?>
<script type="text/javascript">
	var pk = "<?=$pk;?>";
	uploadUrl = baseUrl+'post/upload_file/'+pk+'/';
</script>
<?php } ?>
<?=theme_js('vue-webpack/dist/build.js');?>





