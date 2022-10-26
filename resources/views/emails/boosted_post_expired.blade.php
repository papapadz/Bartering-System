{{-- blade-formatter-disable --}}
@component('mail::message')

Dear {{ $boosted_post->post->user->full_name }},

Good Day! your <span style="font-weight: bold; color: #e6c348">Boost Post</span> subscription has been expired. Thank you for using one of our add-ons feature. <br>
@component('mail::panel')
Boosted Post ⚡ <br>
Transaction No: {{ $payment->transaction_no }} <br>
Title: {{ $boosted_post->post->title }} <br>
Category: {{ $boosted_post->post->category->name }} <br>
Requestor: {{$boosted_post->post->user->full_name}} <br>
Schedule: {{formatDate($boosted_post->date_start) }} - {{formatDate($boosted_post->date_end) }} <br>
Status: Expired
@endcomponent
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
