<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li ><a href="<?=base_url('admin');?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="<?=base_url('post');?>"><i class="icon-stack2"></i> <span>Post</span></a>
									<ul>
										<li class=""><a href="<?=base_url('post');?>"> All posts</a></li>
										<li><a href="<?=base_url('post/add');?>">Add Post</a></li>		
									</ul>
								</li>
								<li>
									<a href="<?=base_url('media');?>"><i class="icon-stack2"></i> <span>Media</span></a>
									<ul>
										<li class=""><a href="<?=base_url('media');?>"> Library</a></li>
										<li><a href="<?=base_url('media/add');?>">Add New</a></li>		
									</ul>
								</li>
								<li>
									<a href="<?=base_url('users');?>"><i class="icon-copy"></i> <span>Users</span></a>
									<ul>
										<li><a href="<?=base_url('users');?>" id="layout1">All Users</a></li>
										<li><a href="<?=base_url('users/profile');?>" id="layout2">Your profile </a></li>
										<li><a href="<?=base_url('users/profile#passwordReset');?>" id="layout2">Change Password </a></li>
										<?php if($this->aauth->is_allowed('admin pages')){?>
										<li><a href="<?=base_url('roles');?>" id="layout3">User Role Editor</a></li>
										<?php } ?>
										
									</ul>
								</li>
								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->