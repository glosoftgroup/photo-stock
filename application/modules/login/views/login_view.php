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

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container" id="vue-app">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					
                    <?php echo form_open('login','class="login"') ?>
						<div class="panel panel-body login-form animated bounceIn">
							
							<div class="text-center">							    
								<span class='fg-danger'><?php echo validation_errors();?></span>
								<div class="icon-objec hvr-grow animated zoomIn">
								  
								</div>
								<h5 class="content-group animated fadeIn">Login to your account <small class="display-block">Enter your credentials below</small></h5>
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
								<button type="submit" class="btn bg-primary btn-block btn-loading btn-ladda-spinner" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Loading ..">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<span class="cursor-pointer" id="recovery">Forgot password?</span>
							</div>
							<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="<?=base_url('register');?>" class="btn btn-default btn-block content-group btn-loading btn-ladda-spinner" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Loading ..">Sign up</a>
							<br>
							<a href="<?=base_url('home');?>" class="btn btn-link btn-block text-bold text-center text-primary">
								<i class=" icon-arrow-left16 pull-left"></i>
								Back Home
							</a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
						</div>
					</form>
					<!-- /simple login form -->


					

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
							<div class='label_text bg-primary animated shake'>
						       <a class="hvr-glow btn-raised legitRipple btn-loading btn-ladda-spinner" href="<?=base_url('login');?>">Login</a>
						    </div>
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

							<button type="submit"  id="reset" onclick="return false;"  class="btn bg-primary btn-block btn-loading btn-ladda-spinner" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Loading ..">Reset password <i class="icon-arrow-right14 position-right "><span class="icon-spinner4 spinner" style='display:none;'></span></i></button>
							<br>
							<template>
  <g-signin-button
    :params="googleSignInParams"
    @success="onSignInSuccess"
    @error="onSignInError">
    Sign in with Google
  </g-signin-button>
</template>
							<a href="<?=base_url('home');?>" class="btn btn-link btn-block text-bold text-center text-primary">
								<i class=" icon-arrow-left16 pull-left"></i>
								Back Home
							</a>
						</div>
					</form>
					<!-- /password recovery -->
					


					<!-- Footer -->
					<div class="footer text-muted text-center">
						 &copy; <?=date('Y');?>. <a href="<?=base_url();?>"></a> 
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
	<?=theme_js("plugins/buttons/ladda.min.js"); ?>
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
        }, 200);
    });
    </script>

