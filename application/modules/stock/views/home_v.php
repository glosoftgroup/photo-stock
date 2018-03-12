<!-- africa stock image -->

<style type="text/css">
	.my-content{
		/*display: flex;*/
		-ms-flex-pack: justify;
		justify-content: space-between;
		padding: 28px 30px 37px 30px;
		margin: 0 auto 30px;
		box-shadow: 1px 1px 22px rgba(157, 184, 209, 0.19);
		border-radius: 3px;
		background-color: #fff;
	}
	.text-danger{
		color: red;
	}
	.mb-20{
		margin-bottom: 20px;
	}
	.btn-black{		
	    background: #000;
	    color: whitesmoke;
	}
	.modal-xs {
    width: 317px;
}
.modal-content {
    -webkit-box-shadow: 0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22);
    box-shadow: 0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22);
}
.modal-content, .well-lg, .well-sm {
    border-radius: 3px;
}
.modal-header {
    position: relative;
    padding-bottom: 0;
}


</style>
<!--===================== Top Panel ========================-->
	<div class="top-panel">
		<div class="container">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active">
				<a href="#plan" aria-controls="plan" role="tab" data-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>75 all</title><rect x="39" y="51" width="4" height="10"/><rect x="29" y="51" width="4" height="10"/><rect x="19" y="51" width="4" height="10"/><path d="M74,63a7,7,0,1,0-7-7A7,7,0,0,0,74,63Zm0-10a3,3,0,1,1-3,3A3,3,0,0,1,74,53Z"/><rect x="39" y="26" width="4" height="10"/><rect x="29" y="26" width="4" height="10"/><rect x="19" y="26" width="4" height="10"/><path d="M74,23a7,7,0,1,0,7,7A7,7,0,0,0,74,23Zm0,10a3,3,0,1,1,3-3A3,3,0,0,1,74,33Z"/><rect x="47" y="28.67" width="13.47" height="4"/><rect x="47" y="53.67" width="13.47" height="4"/><path d="M97,95V17.25a2,2,0,0,0-.07-.49l0-.1a2,2,0,0,0-.21-.46l0,0a2,2,0,0,0-.37-.41l0,0-15-12.25A2,2,0,0,0,80,3H21a2,2,0,0,0-1.2.4l-16,12,0,0-.17.14a2,2,0,0,0-.18.22l-.05.07a2,2,0,0,0-.23.48l0,.12A2,2,0,0,0,3,17H3V95a2,2,0,0,0,2,2H95A2,2,0,0,0,97,95ZM7,19l52.51.14L93,19.24V41H7ZM93,67H7V45H93ZM21.67,7H79.29l10.08,8.23-31.16-.09L11,15ZM93,93H7V71H93Z"/><rect x="39" y="77" width="4" height="10"/><rect x="29" y="77" width="4" height="10"/><rect x="19" y="77" width="4" height="10"/><path d="M74,89a7,7,0,1,0-7-7A7,7,0,0,0,74,89Zm0-10a3,3,0,1,1-3,3A3,3,0,0,1,74,79Z"/><rect x="47" y="79.67" width="13.47" height="4"/></svg>
				<?=siteinfo('name'); ?>
				</a>
				</li>
				<?php if($this->aauth->is_loggedin()){ ?>
				<li>
				<a href="#information" aria-controls="information" role="tab" data-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 90" x="0px" y="0px"><title>03</title><path d="M50,46.82A18.75,18.75,0,1,0,31.25,28.08,18.77,18.77,0,0,0,50,46.82Zm0-31.49A12.75,12.75,0,1,1,37.25,28.08,12.76,12.76,0,0,1,50,15.33Z"/><path d="M80.51,80.78a30.51,30.51,0,0,0-61,0V90.6h61Zm-6,3.83h-49V80.78a24.51,24.51,0,0,1,49,0Z"/></svg>Personal Information</a></li>
				<li>
				<a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">
				<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px"><title>Artboard 14</title><path d="M85,68.83H77.88a2.5,2.5,0,0,0,0,5H85a2.5,2.5,0,0,0,0-5Z"/><path d="M85,79.06H77.88a2.5,2.5,0,0,0,0,5H85a2.5,2.5,0,0,0,0-5Z"/><path d="M87.8,41.21H70.58V25.38A10.58,10.58,0,0,0,60,14.81H12.31A10.58,10.58,0,0,0,1.74,25.38V62A10.58,10.58,0,0,0,12.31,72.6H29.42V88.54A10.47,10.47,0,0,0,39.87,99H87.8A10.47,10.47,0,0,0,98.26,88.54V51.67A10.47,10.47,0,0,0,87.8,41.21Zm0,5a5.47,5.47,0,0,1,5.46,5.46v2.53H70.58v-8ZM6.74,62V25.38a5.58,5.58,0,0,1,5.57-5.57H60a5.58,5.58,0,0,1,5.57,5.57V62A5.58,5.58,0,0,1,60,67.6H12.31A5.58,5.58,0,0,1,6.74,62ZM87.8,94H39.87a5.47,5.47,0,0,1-5.46-5.46V72.6H60A10.58,10.58,0,0,0,70.58,62V59.19H93.26V88.54A5.47,5.47,0,0,1,87.8,94Z"/><path d="M22.61,55.18h-7a2.5,2.5,0,1,0,0,5h7a2.5,2.5,0,1,0,0-5Z"/><path d="M39.67,55.18h-7a2.5,2.5,0,1,0,0,5h7a2.5,2.5,0,0,0,0-5Z"/><path d="M56.73,55.18h-7a2.5,2.5,0,0,0,0,5h7a2.5,2.5,0,0,0,0-5Z"/><path d="M22.58,28.7H20a6.91,6.91,0,0,0,0,13.82h2.58a6.91,6.91,0,1,0,0-13.82Zm0,8.82H20a1.91,1.91,0,0,1,0-3.82h2.58a1.91,1.91,0,1,1,0,3.82Z"/><path d="M85,1a2.5,2.5,0,0,0-2.5,2.5V5.1a8.5,8.5,0,0,0-6.69,8.33c0,2.46,1.12,6.85,8.63,8.57,4.75,1.09,4.75,3.05,4.75,3.7,0,2.5-2.17,3.63-4.19,3.63a4.19,4.19,0,0,1-3.87-2.57,2.5,2.5,0,0,0-4.61,1.93,9.16,9.16,0,0,0,6,5.28v1.65a2.5,2.5,0,0,0,5,0V34a8.5,8.5,0,0,0,6.69-8.33c0-2.46-1.12-6.85-8.63-8.57-4.74-1.08-4.74-3.05-4.74-3.7,0-2.5,2.17-3.63,4.19-3.63a4.18,4.18,0,0,1,3.87,2.57,2.5,2.5,0,0,0,4.61-1.93,9.16,9.16,0,0,0-6-5.28V3.5A2.5,2.5,0,0,0,85,1Z"/></svg>Payments
				</a>
				</li>
				
				<?php } ?>
			</ul>
		</div>
	</div>
	<!--===================== End of Top Panel ========================-->
	<div class="container" id="vue-app">
		<!--===================== Top Content ========================-->
		<div class="tab-content animatedParent">
			<!--===================== Plan ========================-->
			<div role="tabpanel" class="tab-pane active animated bounceInLeft" id="plan">
				<div class="row">
					<div class="col-md-6 my-content">
						<div class="row">
							<div class="">
								<div class="col-md-12">
									<img src="<?=base_url().$post['thumbnail'];?>">
								</div>
								<div class="col-md-12">
								<br>
									<h4 class="my-title"><?=$post['title'];?></h4>
									<p class="my-body">
										<?=$post['body'];?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 account-details">	
					  <?php if($this->aauth->is_loggedin()){ ?>
					  <div class="payment-history" style="width: auto;">
							<div>
								<h6>
								<img style="height: 15px;
margin-right: 3px;" src="<?=img_url();?>camera_dummy.svg">
								<?=$post['title'];?></h6>
								<ul>
									<li>Size: </li>
									<li>Category:</li>
									<li>Type</li>
								</ul>
							</div>
							<div class="last">
							    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_mini" style="margin-bottom: 12px;">Download</button>

								<a id="download_file" download="africa_stock_images_<?=$post['title'].$post['file_name'];?>" style="color:#fff;" class="hidden btn btn-primary" target="_blank" href="<?=base_url().$post['full_path'];?>">Download
							</a>&nbsp;
								<ul>
									<li><?=$post['file_size'];?>KB</li>
									<li>
										<?php 
										$cat = '';
										foreach (post_categories($post['id']) as $key => $value) {
											$cat .= $value->category_name. ' |';
										} 
										echo word_limiter($cat,1);
										?>
									</li>
									<li><?=$post['file_type'];?></li>
								</ul>
							</div>
						</div>
					  <!-- loggedin -->
					  
					  <!-- /loggeding -->
					  <?php }else{?>
					   <form class="my-content" onsubmit="event.preventDefault();">
					   	<h6>Create your Free Account</h6>
						<div class="row">
							<div class="form-group col-6">
								<label>Email <span>*</span></label>
								<input v-model="email" type="text">
								<p class="help-text text-danger">
									${email_error}
								</p>
							</div>
							<div class="form-group col-6">
								<label>Password <span>*</span></label>
								<input @keyup="validatePassword" v-model="password" class="form-control" type="password">
								<p class="help-text text-danger">
									${password_error}
								</p>
							</div>
							<div class="bottom">					
								<button @click="checkEmail">create my account</button>
							</div>
						</div>
					   </form>
					   <!-- login -->
					   <form class="my-content" onsubmit="event.preventDefault();">
					   	<h6>Login</h6>
						<div class="row">
							<div class="form-group col-6">
								<label>Email <span>*</span></label>
								<input v-model="email_login" type="text">
								<p class="help-text text-danger">
									
								</p>
							</div>
							<div class="form-group col-6">
								<label>Password <span>*</span></label>
								<input v-model="password_login" class="form-control" type="password">
								<p class="help-text text-danger">
									
								</p>
							</div>
							<div class="bottom">					
								<button @click="login">Login</button>
							</div>
						</div>
					   </form>
					  <?php } ?>	   
					  
					</div>
				</div>
				
			</div>
			<!--===================== End of Plan ========================-->
			<?php if($this->aauth->is_loggedin()){ ?>
			<!--===================== Information ========================-->
			<div role="tabpanel" class="tab-pane animated bounceInRight" id="information">
				<h5>Personal Information</h5>
				<div class="content">
					<div>
						<h6>Address</h6>
						<ul>
							<li>Name</li>
							<li>Address</li>
							<li>City</li>
							<li>ZIP</li>
							<li>Country</li>
						</ul>
					</div>
					<div class="last">
						<a href="#">Change</a>
						<ul>
							<li><?=user_details(FALSE,'username');?></li>
							<li>
							<?=user_details(FALSE,'address');?>
							</li>
							<li><?=user_details(FALSE,'city');?></li>
							
							<li>
							<?=user_details(FALSE,'postal_code');?>
							</li>
							<li><?=user_details(FALSE,'country');?></li>
						</ul>
					</div>
				</div><!--content-->
				<div class="password">
					<span>Password</span>
					<a href="#">Change Password</a>
				</div><!--password-->
			</div>
			<!--===================== End of Information ========================-->
			<?php } ?>
			<!--===================== Payments ========================-->
			<div role="tabpanel" class="tab-pane animated bounceInLeft" id="payments">
				<h5>Payments</h5>
				<div class="content">
					<div>
						<h6>Billing Address</h6>
						<ul>
							<li>Name</li>
							<li>Address</li>
							<li>City</li>
							<li>State</li>
							<li>ZIP</li>
							<li>Country</li>
						</ul>
						<span><b>Payment Method</b></span>
					</div>
					<div class="last">
						<a href="#">Change</a>
						<ul>
							<li>Holly K Douglas</li>
							<li>4124 Wines Lane</li>
							<li>LITTLE ROCK</li>
							<li>Arkansas</li>
							<li>72214</li>
							<li>USA</li>
						</ul>
						<span>PayPal</span>
					</div>
				</div><!--content-->
				<div class="payment-history">
					<div>
						<h6>Payment History</h6>
						<ul>
							<li>15 Ortober 2017</li>
							<li>12 September 2017</li>
						</ul>
					</div>
					<div class="last">
						<a href="#">Download PDF</a>
						<ul>
							<li>$80</li>
							<li>$80</li>
						</ul>
					</div>
				</div><!--payment-history-->
			</div>
			<!--===================== End of Payments ========================-->
			<!-- Mini modal -->
	<div id="modal_mini" class="modal fade">
		<div class="modal-dialog modal-xs">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h6 class="text-semibold">Ready to download?</h6>
				</div>

				<div class="modal-body">
					
					<div class="total-order">
						<h4>Subscribe and save</h4>
						<ul>
							<li>
								<p>
								Your image will start downloading once you choose your plan.
							</p>
							</li>
						</ul>
						<form>
							<div class="form-group">
								<input name="month" id="month" type="radio">
								<label for="month">10 images / month <span class="first"></span><b>10.00$</b></label>
							</div>
							<div class="form-group">
								<input name="month" id="month" type="radio">
								<label for="month">350 images / month <span class="first"></span><b>150.00$</b></label>
							</div>
							
						</form>
						<span class="hidden total">TOTAL: <b>80.00$</b></span>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button @click='realDownload' type="button" class="btn btn-primary">Buy & Download</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /mini modal -->
		</div>
		<!--===================== End of Top Content ========================-->
	</div>
	
<?=theme_js('plugins/vue/vue.min.js');?>
<?=theme_js('plugins/vue/axios.min.js');?>
<?=theme_js('plugins/vue/vue-resource.common.js');?>
<?=theme_js('create-account.js');?>