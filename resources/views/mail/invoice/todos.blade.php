@component('mail::message')
# Introduction
<p>
    You have received a new Task
</p>
The body of your message.
@foreach ($taches as $tache)
<p>{{$tache->nom}}</p>
<p>{{$tache->description}}</p>
@endforeach

@component('mail::button', ['url' => 'http://localhost:8081/todos'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
