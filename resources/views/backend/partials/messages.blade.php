@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Message</h1>
@stop

@section('content')

    @foreach ($messages as $item)
        <div>
            @if ($item->entreprises_id == 1)
                <p>
                    <strong>{{ $item->name }}</strong>
                    <br>
                    {{ $item->message }}
                </p>
            @elseif ($item->entreprises_id == 2)
                <p>
                    <strong>{{ $item->name }}</strong>
                    <br>
                    {{ $item->message }}
                </p>

            @endif
        </div>

    @endforeach
    {{-- <div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
      <h1>Chat</h1>

      <label for="msg"><b>Message</b></label>
      <textarea placeholder="Type message.." name="msg" required></textarea>

      <button type="submit" class="btn">Send</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form> 
  </div> --}}

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/chat.css"> --}}

@stop

@section('js')
    <script>

    </script>
@stop
