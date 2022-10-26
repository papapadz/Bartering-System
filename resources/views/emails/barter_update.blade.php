{{-- blade-formatter-disable --}}
@component('mail::message')

Dear {{ $barter->bartered_post->user->full_name }},

@if ($barter->status == \App\Models\Barter::ACCEPTED)
Congratulations! you have successfully bartered an item. You can apply a rating for your co-barterer <span style="font-weight: bold; color: #e6c348">{{ $barter->post->user->full_name }}</span> to help our community accumulate legit barterers. You can visit your barter history by clicking the redirect button below.<br>
@component('mail::panel')
Barter ⚡ <br>
Your Item: {{ $barter->bartered_post->title }} <br>
Category: {{ $barter->bartered_post->category->name }} <br>
Target Item: {{ $barter->post->title }} <br>
Category: {{ $barter->post->category->name }} <br>
Owner: {{ $barter->post->user->full_name }} <br>
Date: {{formatDate($barter->created_at) }}  <br>
@endcomponent
@endif

@if ($barter->status == \App\Models\Barter::REJECTED)
Unfortunately your offered item <span style="font-weight: bold; color: #e6c348">{{ $barter->bartered_post->title }}</span> has been rejected by co-barterer {{ $barter->post->user->full_name }}. But don't worry you can always try to offer something new. You can visit your barter history by clicking the redirect button below. <br>
@component('mail::panel')
Barter ⚡ <br>
Your Item: {{ $barter->bartered_post->title }} <br>
Category: {{ $barter->bartered_post->category->name }} <br>
Target Item: {{ $barter->post->title }} <br>
Category: {{ $barter->post->category->name }} <br>
Owner: {{ $barter->post->user->full_name }} <br>
Date: {{formatDate($barter->created_at) }}  <br>
@endcomponent
@endif

Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com

@component('mail::button', ['url' => $url, 'color' => 'warning'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
