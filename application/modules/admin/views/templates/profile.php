<!-- Profile info -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title">Profile information</h6>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		<form method='post' enctype="multipart/form-data" id="user-details-settings">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Username</label>
						<input type="text" name='username' value="<?=user_details($user_id,'username');?>" disabled class="form-control">
					</div>
					<div class="col-md-6">
						<label>Full name</label>
						<input type="text" id='full_name' name='full_name' value="<?=user_details($user_id,'full_name');?>" class="form-control">
						<input type="hidden" value="$user_id" name="user_id">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Address line</label>
						<input type="text" id='address' name='address' value="<?=user_details($user_id,'address');?>" class="form-control">
					</div>
					<div class="col-md-6">
						<label>Email</label>
						<input type="text" readonly="readonly" name='email' value="<?=user_details($user_id,'email');?>" class="form-control">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label>City</label>
						<input type="text" id='city' name='city' value="<?=user_details($user_id,'city');?>" class="form-control">
					</div>
					<div class="col-md-4">
						<label>State/County</label>
						<input type="text" id='county' name='county' value="<?=user_details($user_id,'county');?>" class="form-control">
					</div>
					<div class="col-md-4">
						<label>ZIP/Postal code</label>
						<input type="text" id='postal_code' name='postal_code' value="<?=user_details($user_id,'postal_code');?>" class="form-control">
					</div>
				</div>
			</div>

			

            <div class="form-group">
            	<div class="row">
            		<div class="col-md-6">
						<label>Phone #</label>
						<input type="text" id='phone' name='phone' value="<?=user_details($user_id,'phone');?>" class="form-control">
						<span class="help-block">+254-99-9999-9999</span>
            		</div>

					<!-- <div class="col-md-6">
						<label class="display-block">Upload profile image</label>
                        <input type="file" class="file-styled">
                        <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
					</div> -->
            	</div>
            </div>
            <input type="text" class='hidden' id='user_id' name="user_id" value='<?=$user_id;?>'>
			<div id='alert'></div>

            <div class="text-right">
            	<button type="submit" id='save' class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
            </div>
		</form>
	</div>
</div>
<!-- /profile info -->
