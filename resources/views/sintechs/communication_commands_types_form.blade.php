@extends('layouts.main-layout')

@section('title', 'Vger Admin - Home')

@section('page_name')
    <h1>Vger Admin</h1>
@endsection
@section('breadcrumbs')
<li><a href="#">Vger Admin</a></li>
<li>Comunicação</li>
<li class="active">Tipo de Comandos</li>
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
<h3>Tipos de Comandos</h3><br><br>

	
   <div class="col-lg-4 col-md-6">
   <a href="/communications_admin/list_commands_types">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="fa fa-terminal text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Listar Tipos</div>
                            <div class="stat-text">Total: 64</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
   <div class="col-lg-4 col-md-6"> 
   <a href="/communications_admin/form_commands_types">
           <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="fa fa-plus text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Adicionar Tipo</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
  </div>  
@endsection



@section('final-includes')
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/assets/js/init-scripts/chart-js/chartjs-init.js"></script>
@endsection