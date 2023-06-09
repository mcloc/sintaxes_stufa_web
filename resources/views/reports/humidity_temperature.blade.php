<?php
use App\VgerAlerts;
?>
@extends('layouts.main-layout')

@section('title', 'Vger Admin - Relatórios')

@section('page_name')
    <h1>Relatórios</h1>
@endsection
@section('breadcrumbs')
<li><a href="#">Relatórios</a></li>
<li><a href="#">Humidade e Temperatura</a></li>
@endsection


<!--  TODO: change this div col-sm-12 to mainlayout with a if statement for messages
      and do a yield with only the <span> message
 -->
@section('alert-message')

 <div class="col-sm-12">
 <?php if(VgerAlerts::hasAlert()){ $alert = VgerAlerts::getLastAlert(); ?>
    <div class="alert  alert-success alert-dismissible fade show" role="alert" id="alert-div-<?php echo $alert->id;?>">
        <?php echo $alert->message;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert(<?php echo $alert->id?>);">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }?>
</div>		

@endsection



@section('content')
        <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Module</th>
                                            <th>Status</th>
                                            <th>Uptime</th>
                                            <th>Error Code</th>
                                            <th>Error Message</th>
                                            <th>Created at</th>
                                            <th>Sensor ID</th>
                                            <th>Measure Type</th>
                                            <th>Value</th>
                                            <th>Actuator ID</th>
                                            <th>Actuator Activated</th>
                                            <th>Actuator Activated Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($samps as $key => $sp)
                                        	@foreach($samps[$key]['sampling_sensors'] as $sensor_key => $sensor)
                                        	<tr>
                                            <td>{{$sp['sampling']->id}}</td>
                                            <td>{{$sp['module']->name}}</td>
                                            <td>{{$sp['sampling']->status}}</td>
                                            <td>{{$sp['sampling']->uptime}}</td>
                                            <td>{{$sp['sampling']->error_code}}</td>
                                            <td>{{$sp['sampling']->error_message}}</td>
                                            <td>{{ Carbon\Carbon::parse($sp['sampling']->created_at)->format('d/m/Y H:i:s') }}</td>
                                            <td>{{$sp['sensor'][$sensor_key]->uuid}}</td>
                                            <td>{{$sensor->measure_type}}</td>
                                            <td>{{$sensor->value}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                            @endforeach
				                         	@foreach($samps[$key]['sampling_actuators'] as $actuator_key => $actuators)
                                        	<tr>
                                            <td>{{$sp['sampling']->id}}</td>
                                            <td>{{$sp['module']->name}}</td>
                                            <td>{{$sp['sampling']->status}}</td>
                                            <td>{{$sp['sampling']->uptime}}</td>
                                            <td>{{$sp['sampling']->error_code}}</td>
                                            <td>{{$sp['sampling']->error_message}}</td>
                                            <td>{{ Carbon\Carbon::parse($sp['sampling']->created_at)->format('d/m/Y H:i:s')}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                             <td>{{$sp['actuator'][$actuator_key]->uuid}}</td>
                                            <td>{{$actuators->active}}</td>
                                            <td>{{$actuators->activated_time}}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection

@section('final-includes')
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>


    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="/vendors/datatables.net/js/dataTables.rowGroup.min.js"></script>
    
    <link rel="stylesheet" href="/vendors/datatables.net/css/rowGroup.bootstrap4.min.css">
    <script>


    jQuery(document).ready(function() {
    	jQuery('#bootstrap-data-table-export').DataTable( {
            order: [[0, 'desc']],
            displayLength: 20,
            rowGroup: {
                dataSrc: 6
            }
        } );
    } );
  </script>
	  
@endsection