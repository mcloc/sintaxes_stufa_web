@extends('layouts.main-layout')

@section('title', 'Vger Admin - Home')

@section('page_name')
    <h1>Dashboard</h1>
@endsection
@section('breadcrumbs')
<li><a href="#">Dashboard</a></li>
<li class="active">home</li>
@endsection


<!--  TODO: change this div col-sm-12 to mainlayout with a if statement for messages
      and do a yield with only the <span> message
 -->
@section('alert-message')
 <div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.ction('content')
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>		
@endsection



@section('content')
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Yearly Sales </h4>
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Team Commits </h4>
                                <canvas id="team-chart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Bar chart </h4>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Rader chart </h4>
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Line Chart </h4>
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Doughut Chart </h4>
                                    <canvas id="doughutChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->

                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Pie Chart </h4>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Polar Chart </h4>
                                <canvas id="polarChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Single Bar Chart </h4>
                                <canvas id="singelBarChart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
            </div><!-- .animated -->
                                <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Clima</h4>
                                <canvas id="clima"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->
            <div class="toolbar">
			<button onclick="togglePropagate(this)">Propagate</button>
			<button onclick="toggleSmooth(this)">Smooth</button>
			<button onclick="randomize(this)">Randomize</button>
		</div>
		<div id="chart-analyser" class="analyser"></div>
@endsection

@section('final-includes')
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="/vendors/chart.js/dist/Chart.min.js"></script>
    <script src="/js/utils.js"></script>
    <script src="/js/analyser.js"></script>
    
    <script>
		var presets = window.chartColors;
		var utils = Samples.utils;
		var inputs = {
			min: 1,
			max: 32,
			count: 8,
			decimals: 2,
			continuity: 1
		};

		function generateTemperatureData() {
			var arr_temp = Array();
			<?php foreach($sensors as $sensor_arr){
			    foreach($sensor_arr as $key => $value) {
			        if($key != 'temperature') continue;
			?>
    			arr_temp.push('<?php echo $value;?>');
			<?php } 
            }?>
			console.log(arr_temp);
			return arr_temp;
		}

		function generateHumidityData() {
			var arr_temp = Array();
			<?php foreach($sensors as $sensor_arr){
			    foreach($sensor_arr as $key => $value) {
			        if($key != 'humidity')continue;
			?>
        			arr_temp.push('<?php echo $value;?>');
			<?php } 
            }?>
			console.log(arr_temp);
			return arr_temp;
		}

		function generateHeatIndexData() {
			var arr_temp = Array();
			<?php foreach($sensors as $sensor_arr){
			    foreach($sensor_arr as $key => $value) {
			        if($key != 'heat_index')continue;
			?>
        			arr_temp.push('<?php echo $value;?>');
			<?php } 
            }?>
			console.log(arr_temp);
			return arr_temp;
		}

		function generateLabels() {
			var arr_labels = Array();
			<?php foreach($labels as $label){?>
			arr_labels.push('<?php echo $label;?>');
			<?php }?>
			console.log(arr_labels);
			return arr_labels;
		}

		var data = {
			labels: generateLabels(),
			datasets: [{
				backgroundColor: utils.transparentize(presets.blue),
				borderColor: presets.blue,
				data: generateTemperatureData(),
				label: 'Temperatura',
				fill: '+1'
			}, {
				backgroundColor: utils.transparentize(presets.grey),
				borderColor: presets.grey,
				data: generateHumidityData(),
				label: 'Humidade',
				fill: '+8'
			},  {
				backgroundColor: utils.transparentize(presets.red),
				borderColor: presets.red,
				data: generateHeatIndexData(),
				label: 'Sensação Térmica',
				fill: '+2'
			}, ]
		};

		var options = {
			maintainAspectRatio: true,
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				}
			},
			scales: {
				yAxes: [{
					stacked: true
				}]
			},
			plugins: {
				filler: {
					propagate: false
				},
				'samples-filler-analyser': {
					target: 'chart-analyser'
				}
			}
		};

		var chart = new Chart('clima', {
			type: 'line',
			data: data,
			options: options
		});

		// eslint-disable-next-line no-unused-vars
		function togglePropagate(btn) {
			var value = btn.classList.toggle('btn-on');
			chart.options.plugins.filler.propagate = value;
			chart.update();
		}

		// eslint-disable-next-line no-unused-vars
		function toggleSmooth(btn) {
			var value = btn.classList.toggle('btn-on');
			chart.options.elements.line.tension = value ? 0.4 : 0.000001;
			chart.update();
		}

		// eslint-disable-next-line no-unused-vars
		function randomize() {
			chart.data.datasets.forEach(function(dataset) {
				dataset.data = generateData();
			});
			chart.update();
		}

	    
		
	</script>
    <script src="/assets/js/init-scripts/chart-js/chartjs-init.js"></script>

    
    
    
@endsection




