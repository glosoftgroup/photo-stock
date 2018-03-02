<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	

<div class="content">
	<!-- Main charts -->
	
	<div class="row">
		<div class="col-lg-12">
		   <!-- users tabe -->
	        <!-- PDF with image -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Users</h5>
					<div class="heading-elements">
						<ul class="icons-list">
			        		<li><small class="display-block"><a href="<?=base_url('register');?>"><button class='btn btn-info btn-xl'>Add new</button></a></small></li>
			        	
			        	</ul>
			    	</div>
				</div>

				<div class="panel-body">
					
				</div>

				<table class="table datatable-button-html5-image">
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Role</th>				
						</tr>
					</thead>
					<tbody>
					    <?php foreach ($this->aauth->list_users() as $user) {?>		    	
						<tr>
							<td class='fg-info'><a href="<?=base_url('users/profile/'.$user->id);?>"><?=$user->username;?></a></td>
							<td><?=$user->email;?></td>			
							<td>
							<?php foreach ($this->aauth->get_user_groups($user->id) as $group) {?>
							<?=$group->name.' ';?>
							<?php } ?>
							</td>
							
						</tr>
						<?php } ?>			
					</tbody>
				</table>
			</div>
			<!-- /PDF with image -->
		   <!-- end users table  -->
		</div>						
	</div>
	<!-- /main charts -->
</div>


	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="<?=js_url();?>pages/datatables_extension_buttons_html5.js"></script>