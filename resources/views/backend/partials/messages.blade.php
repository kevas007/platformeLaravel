@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Message</h1>

@stop

@section('content')

<div id="app">
    <chats :messages="{{$messages}}" :entreprises="{{$entreprises}}" :users='{{$user}}' /><chats>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/chat.css">

@stop

@section('js')
    <script src="/js/app.js"></script>

@stop
