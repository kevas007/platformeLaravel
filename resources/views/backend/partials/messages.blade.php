@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Message</h1>
@stop

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card card-bordered">
                        <div class="card-header">
                        </div>
                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                            style="overflow-y: scroll !important; height:400px !important;">

                            {{-- {{ dd($messages) }} --}}
                            @foreach ($entreprises->messages()->orderBy('created_at')->get() as $item)
                            <form method="post" action="/message/{{ $item->id }}">
                                @csrf
                                @if ($item->user_id != Auth::user()->id)
                                <div class="media media-chat"> <img class="avatar"
                                        src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                    <div class="media-body">
                                        <p>
                                            {{ $item->message }}
                                        </p>
                                        <p class="meta">{{ $item->created_at }}</p>
                                    </div>
                                </div>
                            @else

                                <div class="media media-chat media-chat-reverse">
                                    <div class="media-body">
                                    <p> {{ $item->message }}</p>

                                        <p class="meta">{{ $item->created_at }}</p>
                                        {{-- <p>That's awesome!</p>
                                        <p>I will meet you Sandon Square sharp at 10 AM</p>
                                        <p>Is that okay?</p>
                                        <p class="meta"><time datetime="2018">00:09</time></p> --}}
                                    </div>
                                </div>
                            @endif

                        @endforeach


                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                            </div>
                        </div>
                        <div class="publisher bt-1 border-light"> <img class="avatar avatar-xs"
                                src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> <input
                                class="publisher-input" name="message" type="text" placeholder="Write something"> <span
                                class="publisher-btn file-group"> <i class="fa fa-paperclip file-browser"></i> <input
                                    type="file"> </span> <a class="publisher-btn" href="#" data-abc="true"><i
                                    class="fa fa-smile"></i></a> <button class="publisher-btn text-info" type="submit"
                                data-abc="true"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/chat.css">

@stop

@section('js')
    <script>

    </script>
@stop
