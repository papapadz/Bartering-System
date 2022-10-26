{{-- blade-formatter-disable --}}
@component('mail::message')

Dear {{ $flash_barter->post->user->full_name }},

Good Day! your <span style="font-weight: bold; color: #e6c348">Flash Barter</span> subscription has been expired. Thank you for using one of our add-ons feature. <br>
@component('mail::panel')
Flash Barter ⚡ <br>
Transaction No: {{ $payment->transaction_no }} <br>
Title: {{ $flash_barter->post->title }} <br>
Category: {{ $flash_barter->post->category->name }} <br>
Requestor: {{$flash_barter->post->user->full_name}} <br>
Schedule: {{formatDate($flash_barter->date_start) }} - {{formatDate($flash_barter->date_end) }} <br>
Status: Expired
@endcomponent
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
