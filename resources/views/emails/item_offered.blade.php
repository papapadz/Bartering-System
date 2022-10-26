{{-- blade-formatter-disable --}}
@component('mail::message')
# Offerings ⚡

Dear {{ $barter->post->user->full_name }}, <br>
There is a new offered items from your post <span style="font-weight: bold; color: #2F89FC">{{ $barter->post->title }}</span>.
The item offered is <span style="font-weight: bold; color: #e6c348">{{ $barter->bartered_post->title }}</span> from co-barterer {{ $barter->bartered_post->user->full_name }}. You can visit your post by clicking the redirect button. <br> <br>
Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com
@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
