

<header class="<?=$this->template->custom_css;?>">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="logo"><a href="<?=base_url();?>"><img src="<?=img_url('frontend');?>/logo.png" alt="logo"></a></div>
			</div>
			<div class="col-md-7">
				<ul class="menu">
					<li><a href="<?=base_url();?>">Home</a></li>
					<li><a href="javascript:;">About Us</a></li>
					<li class="children">
						<a href="javascript:;">Images</a>
						
					</li><!--children-->
					<li class="children">
						<a href="javascript:;">Vectors</a>
						
					</li>
					<li><a href="javascript:;">Blog</a></li>
					<li><a href="javascript:;">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<div class="button-header">
				<?php if($this->aauth->is_loggedin()){ ?>
					<a href="<?=base_url('admin');?>" class="custom-btn login">Account</a>
					<a href="<?=base_url('login/logout');?>" class="custom-btn">Logout</a>
					
				<?php }else{ ?>
					<a href="<?=base_url('login');?>" class="custom-btn login">Login</a>
					<a href="<?=base_url('register');?>" class="custom-btn">Sign Up</a>
					
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-block">
		<div class="logo-mobile"><a href="javascript:;"><img src="<?=img_url('frontend');?>/logo.png" alt="logo"></a></div>
		<a href="#" class="mobile-menu-btn"><span></span></a>
		<div class="mobile-menu">
			<div class="inside">
				<div class="logo">
					<a href="javascript:;"><img src="<?=img_url('frontend');?>/logo.png" alt="logo"></a>
				</div><!--logo-->
				<ul class="menu panel-group" id="accordion" aria-multiselectable="true">
					<li><a href="javascript:;">Home</a></li>
					<li><a href="javascript:;">About Us</a></li>
					
					<li class="children panel">
						<a href="#menu2" class="collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="menu2">Vectors</a>
						<ul class="sub-menu panel-collapse collapse" id="menu2">
							<li><a href="javascript:;">404 Page</a></li>
							<li><a href="javascript:;">Order</a></li>
							<li><a href="javascript:;">User Interface</a></li>
						</ul><!--sub-menu-->
					</li>
					<li><a href="javascript:;">Blog</a></li>
					<li><a href="javascript:;">Contact Us</a></li>
				</ul><!--menu-->
				<div class="button-header">

					<?php if($this->aauth->is_loggedin()){ ?>
						<a href="<?=base_url('admin');?>" class="custom-btn login">Dashboard</a>
						<a href="<?=base_url('login/logout');?>" class="custom-btn">Logout</a>
					<?php }else{ ?>
						<a href="<?=base_url('login');?>" class="custom-btn login">Login</a>
						<a href="<?=base_url('register');?>" class="custom-btn">Sign Up</a>
						
					<?php } ?>
				</div><!--button-header-->
			</div><!--inside-->
		</div><!--mobile-menu-->
	</div>
</header>