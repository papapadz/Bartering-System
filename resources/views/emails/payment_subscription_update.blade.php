{{-- blade-formatter-disable --}}
@component('mail::message')

Hi {{ $payment->user->full_name ?? $payment->user_name }},

@if ($payment->status == \App\Models\Payment::CONFIRMED)
Good day, your requested subscription has been approved. You can now use your Albarter Pro Account ⚡ for bartering. Enjoy! <br>
@endif

@if ($payment->status == \App\Models\Payment::REJECTED)
Good day, unfortunately your requested subscription has been rejected. You can submit a new registration entry to participate on Albarter.<br>
Remark: {{$payment->remark ?? 'N/A'}} <br>
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com
@endif


@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent














