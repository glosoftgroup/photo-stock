<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="content-group">
								<div class="page-header page-header-inverse" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
									<div class="page-header-content">
										<div class="page-title">
											<h5>
												<i class="icon-arrow-left52 position-left"></i>
												<span class="text-semibold"> Welcome to</span> - <?=siteinfo('name');?>
												<small class="display-block"><?=siteinfo('description');?></small>
											</h5>
										</div>

										<div class="heading-elements">
			                                <button class="btn btn-link btn-icon btn-sm heading-btn"><i class="icon-gear"></i></button>
										</div>
									</div>

									
								</div>
							</div>
					<div class="row">
						<div class="col-lg-7">

							<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Get Started</h6>
									<div class="heading-elements">
										<form class="heading-form" action="#">
											<div class="form-group">
												<label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
													<input type="checkbox" class="switch" checked="checked">
													Manage users
												</label>
											</div>
										</form>
									</div>
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-4">
											<ul class="list-inline text-center">
												<li>
													<a href="<?=base_url('users');?>" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">Add new User</div>
													<div class="text-muted"><?=number_format($this->user_model->get_users_count());?></div>
												</li>
											</ul>

											<div class="col-lg-10 col-lg-offset-1">
												<div class="content-group" id="new-visitors"></div>
											</div>
										</div>

										<div class="col-lg-4">
											<ul class="list-inline text-center">
												<li>
													<a href="layout_navbar_fixed.html#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">New sessions</div>
													<div class="text-muted">08:20 avg</div>
												</li>
											</ul>

											<div class="col-lg-10 col-lg-offset-1">
												<div class="content-group" id="new-sessions"></div>
											</div>
										</div>

										<div class="col-lg-4">
											<ul class="list-inline text-center">
												<li>
													<a href="layout_navbar_fixed.html#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">Total online</div>
													<div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
												</li>
											</ul>

											<div class="col-lg-10 col-lg-offset-1">
												<div class="content-group" id="total-online"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="position-relative" id="traffic-sources"></div>
							</div>
							<!-- /traffic sources -->

						</div>

						<div class="col-lg-5">

							<!-- Sales stats -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Sales statistics</h6>
									<div class="heading-elements">
										<form class="heading-form" action="#">
											<div class="form-group">
												<select class="change-date select-sm" id="select_date">
													<optgroup label="<i class='icon-watch pull-right'></i> Time period">
														<option value="val1">June, 29 - July, 5</option>
														<option value="val2">June, 22 - June 28</option>
														<option value="val3" selected="selected">June, 15 - June, 21</option>
														<option value="val4">June, 8 - June, 14</option>
													</optgroup>
												</select>
											</div>
										</form>
				                	</div>
								</div>

								<div class="container-fluid">
									<div class="row text-center">
										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
												<span class="text-muted text-size-small">orders weekly</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-calendar52 position-left text-slate"></i> 32,568</h5>
												<span class="text-muted text-size-small">orders monthly</span>
											</div>
										</div>

										<div class="col-md-4">
											<div class="content-group">
												<h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i> $23,464</h5>
												<span class="text-muted text-size-small">average revenue</span>
											</div>
										</div>
									</div>
								</div>

								<div class="content-group-sm" id="app_sales"></div>
								<div id="monthly-sales-stats"></div>
							</div>
							<!-- /sales stats -->

						</div>
					</div>
					<!-- /main charts -->


					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-8">

							


							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<div class="heading-elements">
												<span class="heading-text badge bg-teal-800">+53,6%</span>
											</div>

											<h3 class="no-margin">3,450</h3>
											Members online
											<div class="text-muted text-size-small">489 avg</div>
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown">
							                			<a href="layout_navbar_fixed.html#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="layout_navbar_fixed.html#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="layout_navbar_fixed.html#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="layout_navbar_fixed.html#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="layout_navbar_fixed.html#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<h3 class="no-margin">49.4%</h3>
											Current server load
											<div class="text-muted text-size-small">34.6% avg</div>
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">

									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="reload"></a></li>
							                	</ul>
						                	</div>

											<h3 class="no-margin">$18,390</h3>
											Today's revenue
											<div class="text-muted text-size-small">$37,578 avg</div>
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
							</div>
							<!-- /quick stats boxes -->


							


							<!-- Latest posts -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Latest posts</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
			                	</div>

								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6">
											<ul class="media-list content-group">
												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="layout_navbar_fixed.html#">
																<img src="assets/images/demo/flat/1.png" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="layout_navbar_fixed.html#">Up unpacked friendly</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>14 minutes ago</li>
							                    		</ul>
														The him father parish looked has sooner. Attachment frequently gay terminated son...
													</div>
												</li>

												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="layout_navbar_fixed.html#">
																<img src="assets/images/demo/flat/21.png" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="layout_navbar_fixed.html#">It allowance prevailed</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>12 days ago</li>
							                    		</ul>
														Alteration literature to or an sympathize mr imprudence. Of is ferrars subject as enjoyed...
													</div>
												</li>
											</ul>
										</div>

										<div class="col-lg-6">
											<ul class="media-list content-group">
												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="layout_navbar_fixed.html#">
																<img src="assets/images/demo/flat/12.png" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="layout_navbar_fixed.html#">Case read they must</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> Video tutorials</li>
							                    			<li>20 hours ago</li>
							                    		</ul>
														On it differed repeated wandered required in. Then girl neat why yet knew rose spot...
													</div>
												</li>

												<li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="layout_navbar_fixed.html#">
																<img src="assets/images/demo/flat/15.png" class="img-responsive img-rounded media-preview" alt="">
																<span class="zoom-image"><i class="icon-play3"></i></span>
															</a>
														</div>
													</div>

				                					<div class="media-body">
														<h6 class="media-heading"><a href="layout_navbar_fixed.html#">Too carriage attended</a></h6>
							                    		<ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><i class="icon-book-play position-left"></i> FAQ section</li>
							                    			<li>2 days ago</li>
							                    		</ul>
														Marianne or husbands if at stronger ye. Considered is as middletons uncommonly...
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /latest posts -->

						</div>

						<div class="col-lg-4">		
						 <!-- siderbar -->
						 <!-- end sidebar -->
						</div>
					</div>
					<!-- /dashboard content -->

