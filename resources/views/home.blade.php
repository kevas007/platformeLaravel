@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<h3 class="text-center">Welcome {{ Auth::user()->name }}</h3>
<div class="card" >
<div class="d-flex  my-5 mx-5  justify-content-start">
    <a href="/tache/" class="btn btn-primary">Add new Task</a>
</div>
    @include('backend.partials.entreprise')
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
