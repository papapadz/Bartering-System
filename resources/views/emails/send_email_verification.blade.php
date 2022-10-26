{{-- blade-formatter-disable --}}
@component('mail::message')
# Account Activation

Dear {{ $user->full_name }},

Thank you for registering to <span style="font-weight: bold; color: #2F89FC">Albarter</span>

Please click the button below to complete your registration.
This link is valid for 12 hours only.

Thank you very much.

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Activate your account
@endcomponent

<strong>Having trouble?</strong>
if the above button does not work try copying and pasting this link into your browser:
{{ $url }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent





