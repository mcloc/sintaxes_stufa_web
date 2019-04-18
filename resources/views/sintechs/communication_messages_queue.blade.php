@extends('layouts.main-layout')

@section('title', 'Sintechs Admin - Home')

@section('page_name')
    <h1>Sintechs Admin</h1>
@endsection
@section('breadcrumbs')
<li><a href="#">Sintechs Admin</a></li>
<li>Comunicação</li>
<li class="active">Fila de Mensagens</li>
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
<h3>Fila de Mensagens de Comunicação</h3><br><br>

   <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="fa fa-sort-numeric-desc text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Listar Fila Leitura</div>
                            <div class="stat-text">Total: 64</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="fa fa-sort-numeric-asc text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Listar Fila Escrita</div>
                            <div class="stat-text">Total: 23</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
   <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-server text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Registro de Erros</div>
                            <div class="stat-text">Total: 13</div>
                        </div>
                    </div>
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
    <script src="/assets/js/init-scripts/chart-js/chartjs-init.js"></script>
@endsection