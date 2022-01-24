@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Todos</h1>
@stop

@section('content')
    <form method="post" action="/tache">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text"
            name="nom"
            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <div class="form-floating">
                <textarea class="form-control"
                name="description"
                placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
        </div>
        <div class="mb-3">
            <select class="form-select" name="entreprises_id" aria-label="Default select example">
                <option selected>Entreprise</option>
                @foreach ($entreprises as $entreprise)
                <option value='{{
                $entreprise->id }}'>
            {{$entreprise->nom_de_entreprise }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
