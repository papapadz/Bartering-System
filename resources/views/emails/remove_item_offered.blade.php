{{-- blade-formatter-disable --}}
@component('mail::message')
# Removed Item Offered ⚡

Dear {{ $barter->post->user->full_name }}, <br>
Co-barterer {{ $barter->bartered_post->user->full_name }} has removed {{ $barter->post->user->gender == 'male' ? 'his' : 'her' }} item offered <span style="font-weight: bold; color: #e6c348">{{ $barter->bartered_post->title }}</span> from your post <span style="font-weight: bold; color: #2F89FC">{{ $barter->post->title }}</span>.
You can visit your post by clicking the redirect button. <br> <br>
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com
@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
