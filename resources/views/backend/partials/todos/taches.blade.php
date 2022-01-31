@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Todos</h1>
@stop

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Entreprise</th>
                <th scope="col">Todos</th>
                <th scope="col">Statut</th>
            </tr>
        </thead>
        @foreach ($taches as $todo)
            <tbody>
                <tr>
                    <th>
                        {{ $todo->id }}
                    </th>
                    <th>
                        {{-- {{ dd($todo->entreprises) }} --}}
                        {{ $todo->entreprises->nom_de_entreprise }}
                    </th>
                    <th>
                        {{ $todo->nom }}
                    </th>
                    <th>
                        @if ($todo->statut == false)
                            <span class="badge badge-warning">open</span>
                        @elseif ($todo->statut == true)
                            <span class="badge badge-success">done</span>
                        @endif
                    </th>
                </tr>
            </tbody>
        @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
