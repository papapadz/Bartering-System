{{-- blade-formatter-disable --}}
@component('mail::message')

Dear {{ $ad->user->full_name }},

Good Day! your <span style="font-weight: bold; color: #e6c348">Advertisement</span> subscription has been expired. Thank you for using one of our add-ons feature. <br>
@component('mail::panel')
Advertisement ⚡ <br>
Transaction No: {{ $payment->transaction_no }} <br>
Title: {{ $ad->title }} <br>
Requestor: {{$ad->user->full_name}} <br>
Schedule: {{formatDate($ad->date_start) }} - {{formatDate($ad->date_end) }} <br>
Status: Expired
@endcomponent
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
