<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=siteinfo('title');?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">
<style type="text/css">
	.label_text{
    top: 0;
    left: 0;
    background: #f5003a;
    color: #fff;
    z-index: 4;
    position: absolute;
border-radius: 0;
padding: 0 5px;
min-width: 37px;
height: 23px;
font-size: 9px;
line-height: 23px;
font-weight: 500px;
text-align: center;
text-transform: uppercase;
-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
box-shadow: 0 1px 1px rgba(0,0,0,0.1);
font-family: Arial, Helvetica, sans-serif;
}
.label_text a {
  color: #fff;
}
</style>
		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Register','role="form"') ?>
						<div class="panel panel-body login-form">
						    <div class='label_text'>
						       <a href="<?=base_url('login');?>">Login</a>
						    </div>
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
								<h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
								<?php 
							    	if(isset($error_array))
							    	{
							    		foreach ($error_array as $error) {
							    			?>
							    			<div class="alert alert-danger fade in">
							    			  <span class='fg-danger'><?=$error;?></span>
							    			</div>
							    			<?php
							    		}
							    	}
							    ?>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<input class="form-control" placeholder='User Name' id="username" name="username"  value="<?php echo set_value('username'); ?>" type="text" required>
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
								
								<span class="help-block  text-danger"><i id='error_name' class=" position-left"></i> </span>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								 <input class="form-control" placeholder='Create password' id="pass1" name="pass1" type="password" required>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<span class="help-block  text-info"><i id='pass1_error' class=" position-left"></i>Atleast 5 characters long </span>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input class="form-control" placeholder="Repeat password" id="pass2" name="pass2" type="password" required>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
							<span class="help-block  text-danger"><i id='pass2_error' class=" position-left"></i> </span>

							<div class="form-group has-feedback has-feedback-left">
								 <input class="form-control" id="user_email" placeholder='Your email'  value="<?php echo set_value('user_email'); ?>" name="user_email" type="email" required>
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<span class="help-block  text-danger"><i id='error_email' class=" position-left"></i> </span>
							</div>

							<div class="form-group">
								
							</div>

							<button type="submit" id='register' class="btn bg-teal btn-block btn-lg">Register <i class=" position-right" id='reg_loader' ></i></button>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; <?=date('Y');?>. <a href="<?=base_url();?>"> <?=siteinfo('name')?><a> 
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- scripts -->
<script type="text/javascript">
    <?php  $url_ = base_url('index.php/Register/check_password');?>
    $('#pass2').focusout(function(event) {
        //$('#update').html('This is ' + $('#choose').val() + ' and other info');
         //window.location.href =  $('#choose').val() ;
         //alert('hellosdf');
         var url_    = "<?php echo $url_;?>";
         var pass1 = $('#pass1').val();             
         var pass2 = $('#pass2').val();             
         $.post(url_,{pass1:pass1,pass2:pass2},function(result){              
                $( "#pass2_error" ).html(result);
                //$("div.messages").load(location.href + " div.messages");
               

            });
        
    }); 
//-->
</script>
 <script type="text/javascript">
	 <?php $urluser_ = base_url('index.php/Register/user_exist'); ?>
	 urluser_ = "<?php echo $urluser_;?>";

	$( "#username" ).focusout(function() { 
	   var username = $('#username').val();
	    $.post(urluser_, {username:username},  function(data) {
	    $('#error_name').html(data);           
	 });         
	   
	});

</script>

        <script type="text/javascript">
         <?php $urlemail_ = base_url('index.php/Register/email_exist'); ?>
         urlemail_ = "<?php echo $urlemail_;?>";

        $( "#user_email" ).focusout(function() { 
           var user_email = $('#user_email').val();
            $.post(urlemail_, {user_email:user_email},  function(data) {
            $('#error_email').html(data);           
         });         
           
          });
        
        </script>

        <script type="text/javascript">
         $('#register').click(function(){
         	var name = $("#username").val();
	        var emaild = $("#user_email").val();
	        var pass1 = $("#pass1").val();
	        var pass2 = $("#pass2").val();
	        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	        if (!name) {
	            $('#error_name').html('Username required');
	            return false;
	        } else {
	            $("#error_name").addClass("hide").removeClass("show");
	        }
	        if (!emaild) {
	            $('#error_email').html('Email field required');
	            return false;
	        } else {
	            $("#error_email").addClass("hide").removeClass("show");
	        }
	        if (!pass1) {
	            $('#pass1_error').html('password required');
	            return false;
	        } else {
	            $("#pass1_error").addClass("hide").removeClass("show");
	        }
	        if (!pass2) {
	            $('#pass2_error').html('Reapet password required');
	            return false;
	        } else {
	            $("#pass1_error").addClass("hide").removeClass("show");
	        }
         	 //alert('niki');
         	 $("#reg_loader").addClass("icon-spinner4 spinner position-left");
         })
        </script>

</body>
</html>
