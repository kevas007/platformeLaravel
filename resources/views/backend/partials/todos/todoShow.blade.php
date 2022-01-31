@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Todos</h1>
@stop

@section('content')



    {{-- {{ dd($taches) }} --}}
    <div class="row">
        @foreach ($taches as $show)
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Taches:{{ $show->nom }}</div>
                    <div class="card-body">
                        <h5 class="card-title"> Entreprise: {{ $show->nom_de_entreprise }}</h5>
                        <p class="card-text">
                            Description: {{ $show->description }}
                        </p>
                        <p>
                            @if ($show->statut == false)
                                Statut:
                                <span class="badge badge-warning">open</span>
                            @elseif ($show->statut == true)
                            Statut:<span class="badge badge-success">done</span>
                            @endif
                        </p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop
