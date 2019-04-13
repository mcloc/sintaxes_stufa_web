@extends('layouts.main-layout')

@section('title', 'Sintechs Admin - Home')

@section('breadcrumbs')
    <h1>Dashboard</h1>
@endsection




@section('alert-message')
<span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.ction('content')
@endsection


@section('content')
	@parent
@endsection