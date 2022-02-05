@component('mail::message')
# Introduction
<p>
    You have received a new Task
</p>
The body of your message.

@component('mail::button', ['url' => 'http://localhost:8081/todos'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
