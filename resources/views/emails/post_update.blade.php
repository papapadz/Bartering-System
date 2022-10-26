{{-- blade-formatter-disable --}}
@component('mail::message')

Hi {{ $post->user->full_name }},

@if($post->status == \App\Models\Post::APPROVED)
Good Day! Your post <span style="font-weight: bold; color: #2F89FC">{{ $post->title }}</span> has been approved. You can now manage your post for more user engagement.
@endif

@if($post->status == \App\Models\Post::REJECTED)
Good Day! Unfortunatetly there are circumstances that you did not totally comply and the Albarter chooses to reject your post <span style="font-weight: bold; color: #2F89FC">{{ $post->title }}</span>. <br>
Remark: {{ $post->remark  ?? "N/A"}} <br>
Any questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com
@endif

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Redirect
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
