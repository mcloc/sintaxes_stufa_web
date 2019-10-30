@extends('layouts.main-layout')

@section('title', 'Vger Admin - Configurações')

@section('page_name')
    <h1>Configurações</h1>
@endsection
@section('breadcrumbs')
<li><a href="#">Configurações</a></li>
<li><a href="#">Atuadores</a></li>
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
  <div class="col-sm-12 mb-4">
        <div class="card-group">
        	
            <div class="card col-lg-2 col-md-6 no-padding bg-flat-color-1">
                <div class="card-body">
                	<a href="#">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-umbrella text-light"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                        <small class="text-uppercase font-weight-bold text-light">Humidificador</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                     </a>
                </div>
                 
            </div>
           
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-2">
                <a href="#">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-tint text-light"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                        <small class="text-uppercase font-weight-bold text-light">Aspersor</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                 </a>
                </div>
            </div>
           
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                <a href="#">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-tint text-light"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                        <small class="text-uppercase font-weight-bold text-light">Irrigador</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </a>
                </div>
            </div>
            
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                <a href="#">
                    <div class="h1 text-right text-light mb-4">
                        <i class="fa fa-undo"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                       <small class="text-uppercase font-weight-bold text-light">Exaustor</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </a>
                </div>
            </div>
            
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                <a href="#">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-leaf"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                    <small class="text-uppercase font-weight-bold text-light">Nutrientes</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                    </a>
                </div>
            </div>
            
            
            
            <div class="card col-lg-2 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-1">
                <a href="#">
                    <div class="h1 text-light text-right mb-4">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <div class="h5 mb-0 text-light">
                        <small class="text-uppercase font-weight-bold text-light">Luzes</small>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </a>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('final-includes')
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/assets/js/widgets.js"></script>
@endsection