<?=theme_js('plugins/visualization/highcharts/highcharts.js');?>
<?=theme_js('plugins/visualization/highcharts/exporting.js');?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
    //$now = Dates::now();
    $now = Dates::now();
    // echo $now->toFormattedDateString();
    // echo '<br><hr>';
    
    $expire = $this->user_model->get_user_info(get_sessionData(),'expire_date');
    
    $dt = Dates::createFromFormat('Y-m-d H:m:s',$expire);
    //echo $dt->diffForHumans();

	?>


<!-- Main content -->
<div class="content-wrapper">

<!-- Content area -->
<div class="content">
<!-- Dashboard content -->
<div class="row">
<div class="col-lg-8">
<!-- Quick stats boxes -->
<div class="row">
	<a href="<?=base_url('sms');?>">
	<div class="col-lg-4">		
		<!-- sms -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<div class="heading-elements">
					<i class="icon-bubble9"></i>
				</div>

				<h3 class="no-margin"><?=sizeof($sms);?></h3>
				Text messages
				<div class="text-muted text-size-small">489 avg</div>
			</div>

			<div class="container-fluid">
				<div id="sms-graphsh" ></div>
			</div>
		</div>
		<!-- /sms -->
	</div>
	</a>
	<a href="<?=base_url('browser');?>">
	<div class="col-lg-4">		
		<!-- browser -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<div class="heading-elements">
					<i class="icon-bubble9"></i>
				</div>

				<h3 class="no-margin"><?=sizeof($browser);?></h3>
				Browser activities
				<div class="text-muted text-size-small">489 avg</div>
			</div>

			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
		<!-- /browser -->
	</div>
	</a>
	<a href="<?=base_url('call');?>">
	<div class="col-lg-4">		
		<!-- call -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<div class="heading-elements">
					<i class="icon-bubble9"></i>
				</div>

				<h3 class="no-margin"><?=sizeof($calls);?></h3>
				Call Logs
				<div class="text-muted text-size-small">489 avg</div>
			</div>

			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
		<!-- /call -->
	</div>
	</a>
	<a href="<?=base_url('device');?>">
	<div class="col-lg-4">		
		<!-- device -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<div class="heading-elements">
					<i class="icon-bubble9"></i>
				</div>

				<h3 class="no-margin"><?=sizeof($device);?></h3>
				Devices
				<div class="text-muted text-size-small">489 avg</div>
			</div>

			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
		<!-- /call -->
	</div>
	</a>
	<a href="<?=base_url('gps');?>">
	<div class="col-lg-4">		
		<!-- gps -->
		<div class="panel bg-blue-400">
			<div class="panel-body">
				<div class="heading-elements">
					<i class="icon-bubble9"></i>
				</div>

				<h3 class="no-margin"><?=sizeof($gps);?></h3>
				Gps
				<div class="text-muted text-size-small">489 avg</div>
			</div>

			<div class="container-fluid">
				<div id="members-online"></div>
			</div>
		</div>
		<!-- /call -->
	</div>
	</a>
	<div class="col-lg-4">		<!-- Members online -->
		<div class="panel bg-teal-400">
			<div class="panel-body">
				<div class="heading-elements">
					<img width="50" height="50" src="<?=img_url('frontend');?>icons/whatsapp.png">
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







</div>

<div class="col-lg-4">		
<!-- siderbar -->
<div id='sms-graph' style="min-width: 180px; height: auto; margin: 0 auto"></div>
<!-- end sidebar -->
</div>
</div>
<!-- /dashboard content -->

<script>
var smsArray = [];
var callsArray = [];
var browserArray = [];
var gpsArray = [];

//process arrays
<?php foreach($calls_monthly as $key => $val){ ?>
	callsArray.push(parseInt('<?php echo $val; ?>'));
<?php } ?>

<?php foreach($browser_monthly as $key => $val){ ?>
	browserArray.push(parseInt('<?php echo $val; ?>'));
<?php } ?>

<?php foreach($gps_monthly as $key => $val){ ?>
	gpsArray.push(parseInt('<?php echo $val; ?>'));
<?php } ?>

<?php foreach($sms_monthly as $key => $val){ ?>
	smsArray.push(parseInt('<?php echo $val; ?>'));
<?php } ?>



Highcharts.chart('sms-graph', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Logs report'
    },
    
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Total Log(s)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [
		{
        	name: 'SMS',
        	data: smsArray
		},
		{
			name: 'CALLS',
			data: callsArray
		},
		{
			name: 'Browser',
			data: browserArray
		},
		{
			name: 'GPS',
			data: gpsArray
		}
	]
});

$('.highcharts-credits').css('display','none');
</script>