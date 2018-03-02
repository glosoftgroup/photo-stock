<!-- PDF with image -->
<?php foreach ($this->roles_model->get_roles($role_id) as $role) {?>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit user Role </h5>		
    	
	</div>
   
	<div class="panel-body">
		<form>
			<div class="form-group">
				<label class="control-label col-lg-2 text-bold">Edit Name</label>
				<div class="col-lg-10">
					<input type="text" value="<?=$role['name'];?>" class="form-control">
				</div>
			</div>
			
	</div>	
</div>
<div class="panel panel-flat">
	<div class="panel-body">
		<div class="content-group">
			
			<div class="row">
			    <?php $perms_array = $this->aauth->list_perms(); ?>			   	   
				<!-- permisions -->
				<div class="col-md-12">
				<span  id='addme'></span>
				<table class='table'>
				<thead>
				   <tr>
					<th></th>
					<th>Action</th>
					<th></th>
					<th>Permission</th>
				   </tr>
				</thead>
				<tbody>
				 <?php $url = base_url('roles/perm_to_group');?>
				 <?php foreach ($perms_array as $permision) { ?>	
				   <tr>
				   	<td></td>
					<td>
						<div class="checkbox checkbox-switch">
							<label>
								<input type="checkbox" id="<?='check'.$permision->id;?>" class="" <?php if(isGroupAllowed($permision->id,$role_id)){ echo "checked='checked'";};?>>						
							</label>
						</div>	
					</td>
					<td>&nbsp;</td>
					<td><span><?=$permision->name;?></span></td>
				   </tr>
				   <script type="text/javascript">
				   $('#<?="check".$permision->id;?>').click(function(){ 
				     var urlhj = "<?= $url;?>"
				     var role_id = '<?=$role_id;?>';
				     var perm_id = '<?=$permision->id;?>';
				     //alert('eersfe');
				      $.post(urlhj, {role_id:role_id,perm_id:perm_id},  function(data) {
			            $('#addme').html(data);
			           });
			    		
			    	});
				   	
				   </script>
				   <?php } ?>					
				</tbody>		    
					
				</table>
					
				</div>
				<!-- end permissions -->
				 
			</div>
		</div>
		</form>
	</div>
</div>
<?php } ?>
<!-- scripts -->
<script type="text/javascript" src="<?=js_url();?>/plugins/forms/styling/switch.min.js"></script>
 <script type="text/javascript">
 	$(function(){
 		// Bootstrap switch
        // ------------------------------
         $(".switch").bootstrapSwitch();
 	});
 </script>