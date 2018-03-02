<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
					<!-- Cover area -->
				<div class="profile-cover">
					<div class="profile-cover-img" style="height: 144px;background-image: url('<?=img_url();?>/demo/cover2.jpg')"></div>
					<div class="media">
						<div class="media-left">
							<a href="#" class="profile-thumb">
								<img src="<?=img_url();?>/demo/users/face11.jpg" class="img-circle" alt="">
							</a>
						</div>

						<div class="media-body">
				    		<h1><?=get_sessionData('username');?> <small class="display-block"></small></h1>
						</div>

						<div class="media-right media-middle">
							<ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
								<li><a href="#" class="btn btn-default"><i class="icon-file-picture position-left"></i> Cover image</a></li>
								<li><a href="#" class="btn btn-default"><i class="icon-file-stats position-left"></i> Statistics</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /cover area -->


				<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs content-group">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav">
						 <li class="active"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
							<li ><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> Activity</a></li>
							<li><a href="#schedule" data-toggle="tab"><i class="icon-calendar3 position-left"></i> Schedule <span class="badge badge-success badge-inline position-right">32</span></a></li>
							
						</ul>

						<div class="navbar-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="icon-stack-text position-left"></i> Notes</a></li>
								<li><a href="#"><i class="icon-collaboration position-left"></i> Friends</a></li>
								<li><a href="#"><i class="icon-images3 position-left"></i> Photos</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i> <span class="visible-xs-inline-block position-right"> Options</span> <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#"><i class="icon-image2"></i> Update cover</a></li>
										<li><a href="#"><i class="icon-clippy"></i> Update info</a></li>
										<li><a href="#"><i class="icon-make-group"></i> Manage sections</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="icon-three-bars"></i> Activity log</a></li>
										<li><a href="#"><i class="icon-cog5"></i> Profile settings</a></li>
									</ul>
								</li>
							</ul>
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
										<?php if(isset($data)){ $this->load->view('admin/templates/profile',$data);}?>
										<!-- endprofile info -->

									</div>
									<div class="tab-pane fade in " id="activity">
									proifle tab	

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
									<a href="#" class="list-group-item"><i class="icon-user"></i> My profile</a><a href="<?=base_url('users/profile/'.$user_id.'#passwordReset');?>" class="list-group-item"><i class="fa fa-lock"></i>Change Password</a>
									
									<a href="<?=base_url('login/logout');?>" class="list-group-item"><i class="fa fa-sign-out"></i> Log Out</a>
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
									<a href="user_pages_profile_cover.html#" class="list-group-item"><i class="icon-users"></i> <?=$group->name;?></a>
									<?php } ?>
									
								</div>
		                    	</div>
							</div>
							<!-- /share your thoughts -->


														

						</div>
					</div>
					<!-- /user profile -->


