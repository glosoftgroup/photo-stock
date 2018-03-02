<!-- PDF with image -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Users</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
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