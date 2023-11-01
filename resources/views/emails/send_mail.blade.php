@component('mail::message')

Hello {{ $user->name }},
{!! $user->send_message !!}

{{ config('app.name') }}

@endcomponent
