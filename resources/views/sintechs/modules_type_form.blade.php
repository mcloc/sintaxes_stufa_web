@extends('layouts.main-layout')

@section('title', 'Vger Admin - Home')

@section('page_name')
    <h1>Vger Admin</h1>
@endsection
@section('breadcrumbs')
<li><a href="/">Vger Admin</a></li>
<li>Módulos</li>
<li>Tipos</li>
<li class="active">Formulário</li>
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
<h3>Formulário de Tipos de Módulos</h3><br><br>
 <div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <strong>Tipo de Módulo</strong>
    </div>
    <div class="card-body card-block">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" action="/modules_admin/modules_type_save>
        @csrf
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Nome" class="form-control"><small class="form-text text-muted">Nome deve ser único</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descrição</label></div>
                <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Descrição" class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Criado em</label></div>
                <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Atualizado em</label></div>
                <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control"></div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</div>
@endsection



@section('final-includes')
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<script src="/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/js/main.js"></script>
@endsection