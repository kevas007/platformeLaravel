@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Notification</h1>

@stop

@section('content')
    <p>
        Messages:
    </p>
    <ul>

        {{-- {{dd($test['data'])}} --}}
        @foreach ($test as $notification)
            {{-- {{dd( )}} --}}

            {{-- {{dd(Arr::get( $notification, 'data'))}} --}}
            @foreach (Arr::get($notification, 'data') as $item)
                {{-- {{dd($item)}} --}}
                @if (Arr::has($item, ['message']))
                    {{-- {{Arr::get( $notification, 'data')}} --}}



                    <li class="d-flex   @if ($notification->read_at == null)fas fa-check @else fas fa-check-double  @endif ">
                        Entreprise:
                        {{ $entreprise->where('id', Arr::get($item, 'entreprise_id', '/'))->first()->nom_de_entreprise }},
                        message:
                        {{ Arr::get($item, 'message', '/') }},
                        Lu :{{ $notification->read_at }}

                        @if ($notification->read_at == null)
                        <a href="/message/show/{{  Arr::get($item, 'entreprise_id') }}" class="text-primary">
                            <span class="fas fa-eye "></span>
                        </a>
                        @else
                        <a href="/message/show/{{  Arr::get($item, 'entreprise_id') }}"  class="text-secondary">
                            <span class="fas fa-eye "></span>
                        </a>
                        @endif

                    </li>

                @endif
            @endforeach
        @endforeach
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/chat.css">

@stop

@section('js')


@stop
