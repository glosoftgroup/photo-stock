<?=theme_js('plugins/visualization/highcharts/highcharts.js');?>
<?=theme_js('plugins/visualization/highcharts/exporting.js');?>
<?=theme_js('plugins/visualization/d3/d3.min.js');?>
<?=theme_js('plugins/visualization/d3/d3_tooltip.js');?>
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
				<div id="line_chart_simple" ></div>
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
				<div id="chart_area_color"></div>
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
				<div id="chart_area_basic"></div>
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
				<div id="line_chart_color"></div>
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
                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
							<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
							<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
							<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
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

/* ------------------------------------------------------------------------------
*
*  # Statistics widgets
*
*  Specific JS code additions for general_widgets_stats.html page
*
*  Version: 1.0
*  Latest update: Mar 20, 2017
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Messages area chart
    // ------------------------------

    // Initialize chart
    areaChartWidget("#chart_area_basic", 50, '#5C6BC0');
    areaChartWidget("#chart_area_color", 50, 'rgba(255,255,255,0.75)');

    // Chart setup
    function areaChartWidget(element, chartHeight, color) {


        // Basic setup
        // ------------------------------

        // Define main variables
        var d3Container = d3.select(element),
            margin = {top: 0, right: 0, bottom: 0, left: 0},
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = chartHeight - margin.top - margin.bottom;

        // Date and time format
        var parseDate = d3.time.format('%Y-%m-%d').parse;


        // Create SVG
        // ------------------------------

        // Container
        var container = d3Container.append('svg');

        // SVG element
        var svg = container
            .attr('width', width + margin.left + margin.right)
            .attr('height', height + margin.top + margin.bottom)
            .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


        // Construct chart layout
        // ------------------------------

        // Area
        var area = d3.svg.area()
            .x(function(d) { return x(d.date); })
            .y0(height)
            .y1(function(d) { return y(d.value); })
            .interpolate('monotone');


        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.time.scale().range([0, width ]);

        // Vertical
        var y = d3.scale.linear().range([height, 0]);


        // Load data
        // ------------------------------

        d3.json("<?=base_url('admin/data/auth_sms');?>", function (error, data) {

            // Show what's wrong if error
            if (error) return console.error(error);

            // Pull out values
            data.forEach(function (d) {
                d.date = parseDate(d.date);
                d.value = +d.value;
            });

            // Get the maximum value in the given array
            var maxY = d3.max(data, function(d) { return d.value; });

            // Reset start data for animation
            var startData = data.map(function(datum) {
                return {
                    date: datum.date,
                    value: 0
                };
            });


            // Set input domains
            // ------------------------------

            // Horizontal
            x.domain(d3.extent(data, function(d, i) { return d.date; }));

            // Vertical
            y.domain([0, d3.max( data, function(d) { return d.value; })]);



            //
            // Append chart elements
            //

            // Add area path
            svg.append("path")
                .datum(data)
                .attr("class", "d3-area")
                .style('fill', color)
                .attr("d", area)
                .transition() // begin animation
                    .duration(1000)
                    .attrTween('d', function() {
                        var interpolator = d3.interpolateArray(startData, data);
                        return function (t) {
                            return area(interpolator (t));
                        };
                    });


            // Resize chart
            // ------------------------------

            // Call function on window resize
            $(window).on('resize', messagesAreaResize);

            // Call function on sidebar width change
            $(document).on('click', '.sidebar-control', messagesAreaResize);

            // Resize function
            // 
            // Since D3 doesn't support SVG resize by default,
            // we need to manually specify parts of the graph that need to 
            // be updated on window resize
            function messagesAreaResize() {

                // Layout variables
                width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


                // Layout
                // -------------------------

                // Main svg width
                container.attr("width", width + margin.left + margin.right);

                // Width of appended group
                svg.attr("width", width + margin.left + margin.right);

                // Horizontal range
                x.range([0, width]);


                // Chart elements
                // -------------------------

                // Area path
                svg.selectAll('.d3-area').datum( data ).attr("d", area);
            }
        });
    }





    // Simple line chart
    // ------------------------------

    // Initialize chart
    lineChartWidget('#line_chart_simple', 50, '#2196F3', 'rgba(33,150,243,0.5)', '#2196F3', '#fff');
    lineChartWidget('#line_chart_color', 50, '#fff', 'rgba(255,255,255,0.5)', '#fff', '#29B6F6');

    // Chart setup
    function lineChartWidget(element, chartHeight, lineColor, pathColor, pointerLineColor, pointerBgColor) {


        // Basic setup
        // ------------------------------

        // Add data set
        var dataset2 = [
            {
                "date": "04/13/14",
                "alpha": "60"
            }, {
                "date": "04/14/14",
                "alpha": "35"
            }, {
                "date": "04/15/14",
                "alpha": "65"
            }, {
                "date": "04/16/14",
                "alpha": "50"
            }, {
                "date": "04/17/14",
                "alpha": "65"
            }, {
                "date": "04/18/14",
                "alpha": "20"
            }, {
                "date": "04/19/14",
                "alpha": "60"
            }
        ];
        var dataset = JSON.parse('<?=$arr;?>');
        console.log(dataset);

        // Main variables
        var d3Container = d3.select(element),
            margin = {top: 0, right: 0, bottom: 0, left: 0},
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
            height = chartHeight - margin.top - margin.bottom,
            padding = 20;

        // Format date
        var parseDate = d3.time.format("%m/%d/%y").parse,
            formatDate = d3.time.format("%a, %B %e");


        // Add tooltip
        // ------------------------------

        var tooltip = d3.tip()
            .attr('class', 'd3-tip')
            .html(function (d) {
                return "<ul class='list-unstyled mb-5'>" +
                    "<li>" + "<div class='text-size-base mt-5 mb-5'><i class='icon-check2 position-left'></i>" + formatDate(d.date) + "</div>" + "</li>" +
                    "<li>" + "Sales: &nbsp;" + "<span class='text-semibold pull-right'>" + d.alpha + "</span>" + "</li>" +
                    "<li>" + "Revenue: &nbsp; " + "<span class='text-semibold pull-right'>" + "$" + (d.alpha * 25).toFixed(2) + "</span>" + "</li>" + 
                "</ul>";
            });


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
                .attr('width', width + margin.left + margin.right)
                .attr('height', height + margin.top + margin.bottom)
                .append("g")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
                    .call(tooltip);


        // Load data
        // ------------------------------

        dataset.forEach(function (d) {
            d.date = parseDate(d.date);
            d.alpha = +d.alpha;
        });


        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.time.scale()
            .range([padding, width - padding]);

        // Vertical
        var y = d3.scale.linear()
            .range([height, 5]);


        // Set input domains
        // ------------------------------

        // Horizontal
        x.domain(d3.extent(dataset, function (d) {
            return d.date;
        }));

        // Vertical
        y.domain([0, d3.max(dataset, function (d) {
            return Math.max(d.alpha);
        })]);


        // Construct chart layout
        // ------------------------------

        // Line
        var line = d3.svg.line()
            .x(function(d) {
                return x(d.date);
            })
            .y(function(d) {
                return y(d.alpha);
            });


        //
        // Append chart elements
        //

        // Add mask for animation
        // ------------------------------

        // Add clip path
        var clip = svg.append("defs")
            .append("clipPath")
            .attr("id", "clip-line-small");

        // Add clip shape
        var clipRect = clip.append("rect")
            .attr('class', 'clip')
            .attr("width", 0)
            .attr("height", height);

        // Animate mask
        clipRect
              .transition()
                  .duration(1000)
                  .ease('linear')
                  .attr("width", width);


        // Line
        // ------------------------------

        // Path
        var path = svg.append('path')
            .attr({
                'd': line(dataset),
                "clip-path": "url(#clip-line-small)",
                'class': 'd3-line d3-line-medium'
            })
            .style('stroke', lineColor);

        // Animate path
        svg.select('.line-tickets')
            .transition()
                .duration(1000)
                .ease('linear');


        // Add vertical guide lines
        // ------------------------------

        // Bind data
        var guide = svg.append('g')
            .selectAll('.d3-line-guides-group')
            .data(dataset);

        // Append lines
        guide
            .enter()
            .append('line')
                .attr('class', 'd3-line-guides')
                .attr('x1', function (d, i) {
                    return x(d.date);
                })
                .attr('y1', function (d, i) {
                    return height;
                })
                .attr('x2', function (d, i) {
                    return x(d.date);
                })
                .attr('y2', function (d, i) {
                    return height;
                })
                .style('stroke', pathColor)
                .style('stroke-dasharray', '4,2')
                .style('shape-rendering', 'crispEdges');

        // Animate guide lines
        guide
            .transition()
                .duration(1000)
                .delay(function(d, i) { return i * 150; })
                .attr('y2', function (d, i) {
                    return y(d.alpha);
                });


        // Alpha app points
        // ------------------------------

        // Add points
        var points = svg.insert('g')
            .selectAll('.d3-line-circle')
            .data(dataset)
            .enter()
            .append('circle')
                .attr('class', 'd3-line-circle d3-line-circle-medium')
                .attr("cx", line.x())
                .attr("cy", line.y())
                .attr("r", 3)
                .style({
                    'stroke': pointerLineColor,
                    'fill': pointerBgColor
                });

        // Animate points on page load
        points
            .style('opacity', 0)
            .transition()
                .duration(250)
                .ease('linear')
                .delay(1000)
                .style('opacity', 1);

        // Add user interaction
        points
            .on("mouseover", function (d) {
                tooltip.offset([-10, 0]).show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })

            // Hide tooltip
            .on("mouseout", function (d) {
                tooltip.hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of first point
        d3.select(points[0][0])
            .on("mouseover", function (d) {
                tooltip.offset([0, 10]).direction('e').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function (d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });

        // Change tooltip direction of last point
        d3.select(points[0][points.size() - 1])
            .on("mouseover", function (d) {
                tooltip.offset([0, -10]).direction('w').show(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 4);
            })
            .on("mouseout", function (d) {
                tooltip.direction('n').hide(d);

                // Animate circle radius
                d3.select(this).transition().duration(250).attr('r', 3);
            });


        // Resize chart
        // ------------------------------

        // Call function on window resize
        $(window).on('resize', lineChartResize);

        // Call function on sidebar width change
        $(document).on('click', '.sidebar-control', lineChartResize);

        // Resize function
        // 
        // Since D3 doesn't support SVG resize by default,
        // we need to manually specify parts of the graph that need to 
        // be updated on window resize
        function lineChartResize() {

            // Layout variables
            width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


            // Layout
            // -------------------------

            // Main svg width
            container.attr("width", width + margin.left + margin.right);

            // Width of appended group
            svg.attr("width", width + margin.left + margin.right);

            // Horizontal range
            x.range([padding, width - padding]);


            // Chart elements
            // -------------------------

            // Mask
            clipRect.attr("width", width);

            // Line path
            svg.selectAll('.d3-line').attr("d", line(dataset));

            // Circles
            svg.selectAll('.d3-line-circle').attr("cx", line.x());

            // Guide lines
            svg.selectAll('.d3-line-guides')
                .attr('x1', function (d, i) {
                    return x(d.date);
                })
                .attr('x2', function (d, i) {
                    return x(d.date);
                });
        }
    }



    





});

</script>