<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=css_url();?>icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=css_url();?>bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?=css_url();?>core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/progressbar.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					
                    <?php echo form_open('login','class="login"') ?>
						<div class="panel panel-body login-form">
							<div class="text-center">							    
								<span class='fg-danger'><?php echo validation_errors();?></span>
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
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
							    <?php 
							    	if(isset($message))
							    	{
							    		
							    			?>
							    			<div class="alert alert-danger fade in">
							    			  <span class='fg-danger'><?=$message;?></span>
							    			</div>
							    			<?php
							    		
							    	}
							    ?>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="email" class="form-control" required placeholder="E-mail"/>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" class="form-control"  required placeholder="Password"/>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<span id="recovery">Forgot password?</span>
							</div>
							<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="<?=base_url('register');?>" class="btn btn-default btn-block content-group">Sign up</a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="login_advanced.html#">Cookie Policy</a></span>
						</div>
					</form>
					<!-- /simple login form -->

/
					

				</div>
				<!-- /content area -->
				<!-- Content area -->
				<div class="content reset" id="recovery" style="display:none;">
					<style type="text/css">
					.hide {display: none;}
					</style>
					<!-- Password recovery -->
					<form >
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block" id='reset_area'>We'll send you instructions in email</small></h5>
							</div>
							<div class=' email_val_error hide' style='color:red;'>Please Enter your email</div>
							<div class="form-group has-feedback">
								<input type="text" id='email_c' class="form-control" placeholder="Enter your Email" required >
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit"  id="reset" onclick="return false;"  class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right "><span class="icon-spinner4 spinner" style='display:none;'></span></i></button>
						</div>
					</form>
					<!-- /password recovery -->
					


					<!-- Footer -->
					<div class="footer text-muted text-center">
						Copyright &copy; <?=date('Y');?>. <a href="<?=base_url();?>"></a> 
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
 <script type="text/javascript">
       <?php      
        $url_ = base_url('index.php/login/reset');
        ?>
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        $(function(){
         <?php echo "$('#reset').click(function(){"; ?>          	
            var emaild = $('#email_c').val();   
                   
            if (!emaild) {
	            $(".email_val_error").addClass("show").removeClass("hide");          
	            return false;
	        } else {
	            $(".email_val_error").addClass("show").removeClass("hide");
	            if (testEmail.test(emaild)) {
	                $(".email_val_error").addClass("hide").removeClass("show");
	            } else {
	                $(".email_val_error").addClass("show").removeClass("hide");
	                //alert(emaild);
	                return false;
	            }
	        }
           
            <?php echo "var email_c =$('#email_c').val();";?>                                
            
             var url_    = "<?php echo $url_;?>";             
            
             <?php echo "$('#email_c').val('');";?> 
             $("spinner").toggle();

            $.post(url_,{email:email_c},function(result){              
               $( "#reset_area" ).replaceWith(result);
                //$("div.messages").load(location.href + " div.messages");
            

            });
          });
        })
        
    </script>
    <script type="text/javascript">
     $('#recovery').on('click', function() {     	
       $(".login").toggle();
       $('.reset').toggle();
	 });
    </script>
    <script type="text/javascript">
     $('#signup').on('click',function(){
     	$(".login").toggle();
     	$('.signup').toggle();
     });
    </script>
    <script type="text/javascript">
    // Light
    $('#spinner-light-4').on('click', function() {
        var light_4 = $(this).parent();
        $(light_4).block({
            message: '<i class="icon-spinner4 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
        window.setTimeout(function () {
            $(light_4).unblock();
        }, 2000);
    });
    </script>

</body>
</html>
