<div id='newperms'>
    		<form  action='#' style='padding: 23px;'>
    		  <div class='col-lg-5'>
    		  	<div class="input-group">
					<span class="input-group-addon"><i class="icon-group"></i></span>
					<input type="text" id='role_name' name='role_name' class="form-control" placeholder="Role name">
				</div>
				<div class="form-control-feedback">
					<i class="icon-checkmark-circle" id='name_feedback' style='display:none;'></i>
				</div>
				<span class="help-block" id='name_error'>Permission name</span>
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
    	<script type="text/javascript">
    	$('#addRole').click(function(){    		
    		$('#newrole').toggle();
    	});
    	$('#role_name').focusout(function(){
    	<?php $urlcheck_ = base_url('index.php/roles/doPermExist'); ?>
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
    		<?php $urladdrole_ = base_url('index.php/roles/addperm'); ?>
            urladdrole_ = "<?php echo $urladdrole_;?>";
    		var role_name = $('#role_name').val();
    		var definition = $('#definition').val();

    		if (!role_name) {
	            $('#name_error').html("<span class='alert-danger'>Permission name required</span>");
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