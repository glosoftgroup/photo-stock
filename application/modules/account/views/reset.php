<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="panel panel-body login-form animated bounceIn">
                    <div class="text-center">							    
                        <span class='fg-danger'><?php echo validation_errors();?></span>
                        <div class="icon-objec hvr-grow animated zoomIn">
                            <a href="<?=base_url();?>">
                            <img src="<?=img_url();?>logo_sq.png" alt="Logs Kit" style="width:50%">
                            </a>
                        </div>
                        <h5 class="content-group">Your password has been reset successfully. New password has been sent to your email
                            <small class="display-block">
                                Use That password to login
                            </small>
                        </h5>
                        <div class="content-divider text-muted form-group"><span>Password reset</span></div>
							<a href="<?=base_url('login');?>" class="btn btn-default btn-block content-group btn-loading btn-ladda-spinner" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Loading ..">Login</a>							
                        <br>
                        <a href="<?=base_url('home');?>" class="btn btn-link btn-block text-bold text-center text-indigo">
                            <i class=" icon-arrow-left16 pull-left"></i>
                            Back Home
                        </a>
                    </div>
                </div>

            </div>
            <!-- ./content area -->
        </div>
        <!-- ./main content -->
    </div>
    <!-- ./page content -->
</div>
<!-- ./page container -->