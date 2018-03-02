<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">
<style type="text/css">
	.label_text{
    top: 0;
    left: 0;
    color: #fff;
    z-index: 4;
    position: absolute;
	border-radius: 0;
	padding: 0 5px;
	min-width: 37px;
	height: 23px;
	font-size: 9px;
	line-height: 23px;
	font-weight: bold;
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
                    <?php echo form_open_multipart('register','role="form"') ?>
						<div class="panel panel-body login-form animated bounceIn">
						    
							<div class="text-center">
								
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
								 <input class="form-control" id="user_email" placeholder='Your email'  value="<?php echo set_value('user_email'); ?>" name="user_email" type="email" required>
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<span class="help-block  text-danger"><i id='error_email' class=""></i> </span>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								 <input class="form-control" placeholder='Create password' id="pass1" name="pass1" type="password" required>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<span class="help-block  text-info"><i id='pass1_error' class=" "></i>Atleast 6 characters long </span>
							</div>
							<div class="form-group has-feedback has-feedback-left">
								<input class="form-control" placeholder="Repeat password" id="pass2" name="pass2" type="password" required>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>
							<span class="help-block  text-danger"><i id='pass2_error' class=" "></i> </span>

							

							<div class="form-group">
								
							</div>

							<button type="submit" id='register' class="btn bg-primary btn-block btn-raised legitRipple btn-lg btn-ladda-spinner btn-loading" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Loading ..">Register <i class=" position-right" id='reg_loader' ></i></button>
							<br>
							<a href="<?=base_url('home');?>" class="btn btn-link btn-block text-bold text-center text-primary">
								<i class=" icon-arrow-left16 pull-left"></i>
								Back Home
							</a>
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
<?= theme_js("plugins/buttons/ladda.min.js");?>
<script type="text/javascript">
	
    <?php  $url_ = base_url('index.php/register/check_password');?>
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
         <?php $urlemail_ = base_url('index.php/register/email_exist'); ?>
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
         	
	        var emaild = $("#user_email").val();
	        var pass1 = $("#pass1").val();
	        var pass2 = $("#pass2").val();
	        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	        
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
		 
		 // Initialize on button click
		 $('.btn-loading').click(function () {
			var btn = $(this);
			btn.button('loading')
			setTimeout(function () {
				btn.button('reset')
			}, 3000)
		});

		// Button with spinner
		Ladda.bind('.btn-ladda-spinner', {
			dataSpinnerSize: 16,
			timeout: 2000
		});
        </script>


