<!-- PDF with image -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">User Roles </h5>
		<span class='label bg-success' id='addRole'>Add New Role</span>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
    	<div id='newrole' style="display:none;">
    		<form  action='#' style='padding: 23px;'>
    		  <div class='col-lg-5'>
    		  	<div class="input-group">
					<span class="input-group-addon"><i class="icon-group"></i></span>
					<input type="text" id='role_name' name='role_name' class="form-control" placeholder="Role name">
				</div>
				<div class="form-control-feedback">
					<i class="icon-checkmark-circle" id='name_feedback' style='display:none;'></i>
				</div>
				<span class="help-block" id='name_error'>Role name</span>
    		  </div>
    		  <div class='col-lg-5'>
    		  <div class="input-group">
					<span class="input-group-addon"><i class="icon-info"></i></span>
					<input type="text" id='definition' name='definition' class="form-control" placeholder="definition">
				</div>
				<div class="form-control-feedback">
					<i class="icon-checkmark-circle" id='definition_feedback' style='display: none;' ></i>
				</div>
				<span class="help-block" id='definition_error'>Definition</span>
    		  </div>
    		  <div class="col-lg-2"><button class='btn btn-success' id='addrole_btn' onclick='return false;'>Add</button></div>
    		</form>
    	</div>
	</div>
    <script type="text/javascript">
    	$('#addRole').click(function(){    		
    		$('#newrole').toggle();
    	});
    	$('#role_name').focusout(function(){
    	<?php $urlcheck_ = base_url('index.php/roles/doRoleExist'); ?>
          var urlcheck_ = "<?php echo $urlcheck_;?>";
         var role_name = $('#role_name').val();
         if (!role_name) {
	            $('#name_error').html('<span class="alert-danger">Role name required</span>');
	            return false;
	        } else {
	            $("#name_error").addClass("hide").removeClass("show");
	        }
          $.post(urlcheck_, {role_name:role_name},  function(data) {
            $('#name_error').html(data);

           });
    	});
    	$('#addrole_btn').click(function (){
    		<?php $urladdrole_ = base_url('index.php/roles/addRole'); ?>
            urladdrole_ = "<?php echo $urladdrole_;?>";
    		var role_name = $('#role_name').val();
    		var definition = $('#definition').val();

    		if (!role_name) {
	            $('#name_error').html("<span class='alert-danger'>Role name required</span>");
	            $("#name_error").addClass("show").removeClass("hide");
	            return false;
		        } else {
		            $("#name_error").addClass("hide").removeClass("show");
		        }
		    if (!definition) {
	            $('#definition_error').html("<span class='alert-danger'>Definition required</span>");
	            $("#name_error").addClass("hide").removeClass("show");
	            return false;
		        } else {		        	
		            $("#definition_error").addClass("hide").removeClass("show");
		        }
		     $.post(urladdrole_, {role_name:role_name,definition:definition},  function(data) {
            $('#name_error').html(data); 
            $("#name_error").addClass("show").removeClass("hide");

           });
    	})

    </script>
	<div class="panel-body">
		
	</div>

	<table class="table datatable-button-html5-image">
		<thead>
			<tr>
				<th></th>
				<th>Role Title</th>
				<th>Number of Members</th>
				<th>Description</th>				
			</tr>
		</thead>
		<tbody>
		    <?php foreach ($this->aauth->list_groups() as $group) {?>		    	
			<tr>
				<td></td>
				<td >
				<a href="<?=base_url('roles/edit/'.$group->id);?>"><span class='text-bold'><?=$group->name;?></span><br>
				    <element class='text-small badge badge-primary'>edit</element>
				</a></td>			
				<td><?=number_format(count($this->aauth->list_users($group->name)));?></td>			
				<td><?=$group->definition;?></td>			
			</tr>
			<?php } ?>			
		</tbody>
	</table>
</div>
<!-- /PDF with image -->
