{{-- blade-formatter-disable --}}
@component('mail::message')

Dear {{ $payment->user->full_name }},

@if ($payment->status == \App\Models\Payment::CONFIRMED)
Good Day! Your <span style="font-weight: bold; color: #e6c348">Advertisement</span> request has been approved.<br>
@component('mail::panel')
Advertisement ⚡ <br>
Transaction No: {{ $payment->transaction_no }} <br>
Title: {{ $payment->paymentable->title }} <br>
Requestor: {{$payment->user->full_name}} <br>
Schedule: {{formatDate($payment->paymentable->date_start) }} - {{formatDate($payment->paymentable->date_end) }} <br>
Remark: {{$payment->paymentable->remark ?? 'N/A'}} 
@endcomponent
@endif

@if ($payment->status == \App\Models\Payment::REJECTED)
Unfortunately your <span style="font-weight: bold; color: #e6c348">Advertisement</span> request has been rejected.<br>
@component('mail::panel')
Requested Advertisement ⚡ <br>
Transaction No: {{ $payment->transaction_no }} <br>
Title: {{ $payment->paymentable->title }} <br>
Requestor: {{$payment->user->full_name}} <br>
Schedule: {{formatDate($payment->paymentable->date_start) }} - {{formatDate($payment->paymentable->date_end) }} <br>
Remark: {{$payment->paymentable->remark ?? 'N/A'}} 
@endcomponent
@endif
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com

@component('mail::button', ['url' => $url, 'color' => 'warning'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
