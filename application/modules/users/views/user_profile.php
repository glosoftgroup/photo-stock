<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Toolbar -->
<div class="navbar navbar-default navbar-xs content-group">
	<ul class="nav navbar-nav visible-xs-block">
		<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
	</ul>

	<div class="navbar-collapse collapse" id="navbar-filter">
		<ul class="nav navbar-nav">
		 <li class="active"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Account</a></li>
			<li ><a href="#activity" data-toggle="tab"><i class="icon-user-lock position-left"></i> Security</a></li>
			<li><a href="#schedule" data-toggle="tab"><i class="icon-calendar3 position-left"></i> Notification <span class="hidden badge badge-success badge-inline position-right">32</span></a></li>
			
		</ul>

		<div class="navbar-right">
			<ul class="nav navbar-nav"></ul>
		</div>
	</div>
</div>
<!-- /toolbar -->
	
<!-- Content area -->
<div class="content">

	<!-- User profile -->
	<div class="row">
		<div class="col-lg-9">
			<div class="tabbable">
				<div class="tab-content">
					<div class="tab-pane in active fade" id="settings">

						<!-- profile info -->
						<?php if(isset($user_id)){ $data['user_id'] = $user_id;} ?>
						<?php if(!$this->aauth->is_admin()){
							if($user_id != get_sessionData('id'))
								{ echo alert_user("You do not have permission to access this page"); return false;}
						} ?>
						<!-- Profile info -->
<div class="panel panel-flat">
  <div class="panel-heading">
    <h6 class="panel-title">Profile information</h6>
    <div class="heading-elements">
      <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
          </ul>
      </div>
  </div>

  <div class="panel-body">
    <form method='post' enctype="multipart/form-data" id="user-details-settings">
      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Username</label>
            <input type="text" name='username' value="<?=user_details($user_id,'username');?>" disabled class="form-control">
          </div>
          <div class="col-md-4">
            <label>Email</label>
            <input type="text" readonly="readonly" name='email' value="<?=user_details($user_id,'email');?>" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Phone #</label>
            <input type="text" id='phone' name='phone' value="<?=user_details($user_id,'phone');?>" class="form-control">
            <span class="help-block">+254-99-9999-9999</span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-md-4">
            <label>Address line</label>
            <input type="text" id='address' name='address' value="<?=user_details($user_id,'address');?>" class="form-control">
          </div>
          <div class="col-md-4">
            <label>City</label>
            <input type="text" id='city' name='city' value="<?=user_details($user_id,'city');?>" class="form-control">
          </div>
          
          <div class="col-md-4">
            <label>ZIP/Postal code</label>
            <input type="text" id='postal_code' name='postal_code' value="<?=user_details($user_id,'postal_code');?>" class="form-control">
          </div>
          
        </div>
      </div>


      

            <div class="form-group">
              <div class="row">
                

          <!-- <div class="col-md-6">
            <label class="display-block">Upload profile image</label>
                        <input type="file" class="file-styled">
                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
          </div> -->
              </div>
            </div>
            <input type="text" class='hidden' id='user_id' name="user_id" value='<?=$user_id;?>'>
      <div id='alert'></div>

            <div class="text-right">
              <button type="submit" id='save' class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
    </form>
  </div>
</div>
<!-- /profile info -->
						<!-- endprofile info -->

					</div>
					<div class="tab-pane fade in " id="activity">
					<!-- Account settings -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title">Account settings</h6>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body" id='passwordReset'>
		<form method="post" id="passwordResetSettings" action="#"> 
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Username</label>
						<input type="text" value="<?=user_details($user_id,'username');?>" readonly="readonly" class="form-control">
					</div>
                    <?php if($user_id == get_sessionData('id')){?>
					<div class="col-md-6">
						<label>Current password</label>
						<input type="password" id='currentPassword' name='currentPassword' class="form-control">
					</div>
					<?php } ?>
				</div>
			</div>
            <div id='updatePasswordMessage'></div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>New password</label>
						<input type="password" id='newPassword' name='newPassword' placeholder="Enter new password" class="form-control">
					</div>

					<div class="col-md-6">
						<label>Repeat password</label>
						<input type="password" id='repeatnewPassword' name='repeatnewPassword' placeholder="Repeat new password" class="form-control">
					</div>
					<input type="hidden" value="<?=$user_id;?>" name="user_id">
				</div>
			</div>


            <div class="text-right">
            	<button type="submit" id='updatePassword' class="btn btn-primary">Update password <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
	</div>
</div>
<!-- /account settings -->

					</div>

					<div class="tab-pane fade" id="schedule">


					</div>

					
				</div>
			</div>
		</div>

		<div class="col-lg-3">

			<!-- Navigation -->
	    	<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">Navigation</h6>
					<div class="heading-elements">
						<a href="#" class="heading-text">See all &rarr;</a>
                	</div>
				</div>

				<div class="list-group no-border no-padding-top">
					<a href="#settings" data-toggle="tab" class="list-group-item">
						<i class="icon-user"></i> My profile
					</a>
					<a  class="list-group-item" href="#activity" data-toggle="tab" >
						<i class="icon-user-lock"></i>Change Password
					</a>
					
					<a href="<?=base_url('login/logout');?>" class="list-group-item">
						<i class="icon-switch2"></i> Log Out
					</a>
				</div>
			</div>
			<!-- /navigation -->


			<!-- Share your thoughts -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><?php if(isyourProfile($user_id)){ echo "Your ";}else { echo "User ";}  ?> Groups</h6>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>

				<div class="panel-body">
					<div class="list-group no-border no-padding-top">
					<?php foreach ($this->aauth->get_user_groups($user_id) as $group) {?>
					<a href="#" class="list-group-item"><i class="icon-users"></i> <?=$group->name;?></a>
					<?php } ?>
					
				</div>
            	</div>
			</div>
			<!-- /share your thoughts -->


										

		</div>
	</div>
	<!-- /user profile -->


<?=theme_js("plugins/ui/jquery-validation/jquery.validate.min.js");?>
<script type="text/javascript">
	$( document ).ready(function() {
    // validate
    $('#user-details-settings').validate({
    rules:{
        re_order: {
          required:true,
          minlength:3
        },      

    },
    messages:{
      name:{
        required: "please provide a name",
        minlength: "name must be atleast 3 characters long"
      },      
    },
    submitHandler: function() { 
      
      if(1 != ''){
          var f = document.getElementById('user-details-settings');
          var formData = new FormData(f);
          
          for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]); 
          }
          if (formData) {
                $.ajax({
                    url: "<?=base_url('users/updateProfile/');?>",
                    data: formData,
                    method:'post',
                    processData: false,
                    contentType: false,
                    success:function(data){
                       console.log(data);
                       $("#name").val('');               
                       $("#nid").val('');               

                       $.jGrowl('Profile updated successfully,', {
                          header: 'Well done!',
                          theme: 'bg-success'
                       });
                       
                      localStorage.setItem('user_id', data);
                      $('.user_id').val(localStorage.getItem("user_id"));
                      //window.location = "{% url 'dashboard:terminals'%}";
                    },
                    error:function(error){
                      console.log(error);
                      $.jGrowl('Change a few things up and try submitting again', {
                          header: 'Oh snap!',
                          theme: 'bg-danger'
                      });
                    }
                });
            } 
      }else{
        $.jGrowl('Image is empty fill and try submitting again', {
            header: 'Oh snap!',
            theme: 'bg-danger'
        });
      }
    }
  });
    // end validate
    });
   
</script>
<script type="text/javascript">
	$('#passwordResetSettings').validate({
    rules:{
        currentPassword: {
          required:true,
          minlength:3
        },
        newPassword:{
          required:true,
          minlength: 6
        },
        repeatnewPassword:{
          required:true,
          minlength:6,
          equalTo: "#newPassword"
        },      

    },
    messages:{
      name:{
        required: "please provide a name",
        minlength: "name must be atleast 3 characters long"
      },      
    },
    submitHandler: function() { 
      
      if(1 != ''){
          var f = document.getElementById('passwordResetSettings');
          var formData = new FormData(f);
          
          for (var pair of formData.entries()) {
              console.log(pair[0]+ ', ' + pair[1]); 
          }
          if (formData) {
                $.ajax({
                    url: "<?=base_url('users/updatePassword/');?>",
                    data: formData,
                    method:'post',
                    processData: false,
                    contentType: false,
                    success:function(data){
                       //console.log(data);         

                       $.jGrowl('Password updated successfully,', {
                          header: 'Well done!',
                          theme: 'bg-success'
                       });                       
                      
                      //window.location = "{% url 'dashboard:terminals'%}";
                    },
                    error:function(error){
                      console.log(error['responseText']);
                      $.jGrowl(error['responseText'], {
                          header: 'Oh snap!',
                          theme: 'bg-danger'
                      });
                    }
                });
            } 
      }else{
        $.jGrowl('Image is empty fill and try submitting again', {
            header: 'Oh snap!',
            theme: 'bg-danger'
        });
      }
    }
  });
    // end validate
 

</script>


