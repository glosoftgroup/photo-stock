<style type="text/css">
/* nav bar search box - drop down menu button */
.navbar .navbar-search .dropdown-menu { min-width: 55px; }
.dropdown-menu .label-icon { margin-left: 5px; }
.btn-outline {
    background-color: transparent;
    color: inherit;
    transition: all .5s;
}

</style>
<div class="choice-plan animatedParent">
	<div class="container" id="app">
		
		
	</div><!--container-->
	<!--===================== Info Plan ========================-->

	<!--===================== End of Info Plan ========================-->
</div>

<div class="container small">
	<div class="our-team animatedParent">
	<h4 class="title-head theme-title" style="padding:12px;color:#e15126;">Be inspired by our curated collections</h4>
	<ul>
		<li class="animated bounceInUp delay-250 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">The Arts</a>
				<span></span>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-550 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Beauty/Fashion</a>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-750 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Nature</a>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-1000 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Cultural</a>
			</div><!--inside-->
		</li>
	</ul>
	<ul>
		<li class="animated bounceInUp delay-1000 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Educational</a>
				<span></span>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-1250 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Food and Drinks</a>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-1500 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Business/Finance</a>
			</div><!--inside-->
		</li>
		<li class="animated bounceInUp delay-1750 go">
			<img src="<?=img_url('frontend');?>team-img.png" alt="team-img">
			<div class="inside">
				<a href="#" class="name">Building/Landmarks</a>
			</div><!--inside-->
		</li>
	</ul>
	</div>
</div>
<?=theme_js('vue-webpack/dist/build.js','frontend');?>

