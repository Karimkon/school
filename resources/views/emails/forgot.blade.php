@component('mail::message')

Hello {{ $user->name }},

<p>We understand it happens. </p>

@component('mail::button', ['url' => url('reset/' . optional($user->table)->remember_token)])


    Reset your password

@endcomponent

<p>In case you have issues resetting your password, please feel free to contact us, thank you 😊</p>

{{ config('app.name') }}

@endcomponent
