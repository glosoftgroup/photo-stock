<style type="text/css">
	.navbar-brand > img {
    margin-top: -6px;
    height: 34px;
}
</style>

<!-- Main navbar -->
<div class="navbar navbar-default">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url();?>"><img src="<?=img_url('frontend');?>logo_default.png" alt="Logo"></a>

		<ul class="nav navbar-nav visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav">
			<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>			
		</ul>

		<div class="navbar-right">
			<p class="navbar-text"></p>
			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>
			
			<ul class="nav navbar-nav">				
									
			</ul>
		</div>
	</div>
</div>
<!-- /main navbar -->