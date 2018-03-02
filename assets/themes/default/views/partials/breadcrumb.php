<div class="breadcrumb-line breadcrumb-line-component content-group-l" style="margin-bottom:13px;">
	<ul class="breadcrumb">
		<li><?php echo anchor('admin/', 'Home'); ?></li>
		<?php
		if ($this->uri->segment(1))
		{
			?>
			<li><?php echo anchor($this->uri->segment(1), humanize($this->uri->segment(1))); ?></li>
			<?php } ?>
		<li class="active"><?php echo $this->template->title; ?></li>
	</ul>

	<ul class="breadcrumb-elements hidden">
		<li><a href="components_breadcrumbs.html#" class="legitRipple"><i class="icon-comment-discussion position-left"></i> Chats</a></li>
		<li class="dropdown">
			<a href="components_breadcrumbs.html#" class="dropdown-toggle legitRipple" data-toggle="dropdown">
				<i class="icon-gear position-left"></i>
				Actions
				<span class="caret"></span>
			</a>
			
		</li>
	</ul>
	<a class="breadcrumb-elements-toggle">
		<i class="icon-menu-open"></i>
	</a>
</div>