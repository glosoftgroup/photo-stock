<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?=img_url();?>/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>				
			</ul>

			<p class="navbar-text"><span class="label bg-success"><?=siteinfo('name');?></span></p>

			<ul class="nav navbar-nav navbar-right">
					

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=img_url();?>/demo/users/face11.jpg" alt="">
						<span><?=get_sessionData('username');?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?=base_url('users/profile');?>"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="<?=base_url('users/profile');?>"><i class="icon-cog5"></i> Account settings</a></li>						
						<li><a href="<?=base_url('users/profile#passwordReset');?>"><i class="icon-lock"></i> Change Password</a></li>
						<li><a href="<?=base_url('login/logout');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>