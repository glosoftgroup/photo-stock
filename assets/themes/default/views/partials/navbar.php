<!-- Second navbar -->
<div class="navbar navbar-inverse bg-indigo" id="navbar-second">
<ul class="nav navbar-nav no-border visible-xs-block">
	<li>
	<a class="text-center collapsed" style="padding:9px 9px;" data-toggle="" data-target="#-second-toggle">
		<div class='table-responsive' style="border: 0px;">
			<table class="table table-xs text-nowrap " style="border: 0px;">
				<tbody style="border: 0px;">
				<tr style="border: 0px; padding:0px 0px">
					<td class="col-md-4" style="border: 0px; padding:0px 0px">
						<a class="text-white" href="<?=base_url('admin');?>">
						<i class="icon-display4 position-left"></i><br> Dashboard</a>	
					</td>
					<td style="border: 0px; padding:0px 0px">
						<a class="text-white" href="<?=base_url('users/profile/'.$_SESSION['id']);?>">
						<i class="icon-cogs position-left"></i><br> Account</a>	
					</td>
					
					<td style="border: 0px; padding:0px 0px">
						<a class="text-white" href="<?=base_url('admin');?>">
						<i class="icon-mobile position-left"></i><br> Mobile</a>	
					</td>
					<td style="border: 0px; padding:0px 0px">
						<a class="text-white" href="<?=base_url('droplogs/listing');?>">
						<i class="icon-display position-left"></i><br>Desktop</a>
				   </td>
				   <td style="border: 0px; padding:0px 0px">
						<a class="text-white" href="<?=base_url('login/logout');?>">
						<i class="icon-switch position-left"></i><br>Logout</a>
                   </td>			
					
				</tr>
				</tbody>
            </table>
        </div>
	</a>
	</li>
</ul>

<div class="navbar-collapse collapse" id="navbar-second-toggle">
	<ul class="nav navbar-nav">
		<li><a href="<?=base_url('admin');?>"><i class="icon-display4 position-left"></i> Dashboard</a></li>
		<li><a href="<?=base_url('users/profile/'.$_SESSION['id']);?>"><i class="icon-cogs position-left"></i> Account Settings</a></li>
		<li><a href="<?=base_url('admin');?>"><i class="icon-mobile position-left"></i> Mobile Logs</a></li>
		<li><a href="<?=base_url('droplogs/listing');?>"><i class="icon-display position-left"></i> Desktop Logs</a></li>		
		<li class="dropdown mega-menu mega-menu-wide">
		</li>		
	</ul>
	

	<ul class="nav navbar-nav navbar-right">
	<?php if($this->cart->total_items() > 0): ?>
		<li class="dropdown animated bounceIn">
			<a class="dropdown-toggle legitRipple" data-toggle="dropdown" data-hover="dropdown">
				<i class=" icon-cart5"></i>
				<span class="visible-xs-inline-block position-right">Tasks</span>
				<span class="badge bg-info"><?=$this->cart->total_items();?></span>
			</a>

			<ul class="dropdown-menu dropdown-menu-right">
			<?php foreach ($this->cart->contents() as $items): ?>
				<li>
				 <a href="<?=base_url('cart');?>">
				  <h6 class="no-margin text-bold">
				  <?=$items['name']; ?><br>
				  <?=$items['price']; ?>
				  <small class="display-block text-muted text-size-small">
				   <?=$items['package_name']; ?> package 
				   <span class="badge badge-primary pointer-cursor">check out</span>
				  </small></h6>
				   
				 </a>
				</li>
             <?php endforeach; ?>	
			</ul>
		</li>
	    <?php endif; ?>
		<li><a href="#"></a></li>

		
	</ul>
</div>
</div>
<!-- /second navbar -->