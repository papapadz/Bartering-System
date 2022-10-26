@extends('layouts.main.app')

@section('title', "Albarter | $post->title")

@section('styles')
    <link href="{{ asset('assets/css/utils/eone.min.css') }}" rel="stylesheet">
    <style>
        td {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal !important;
            text-align: justify;
        }
    </style>
@endsection

@section('content')
    {{-- CONTAINER --}}
    <div class="container-fluid mt-10"><br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main.posts.index') }}">All Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>
        @include('layouts.includes.alert')
        <div class="row">
            <div class="col-md-2">
                @forelse ($ads as $ad)
                    <div class="card w-100 card-shadow-none hoverable">
                        <a href="{{ route('main.ads.show', $ad) }}">
                            <img class="card-img-top" src="{{ handleNullFeaturedPhoto($ad->featured_photo) }}"
                                width="75" alt="ads" title="{{ $ad->title }}">
                        </a>
                    </div>
                @empty
                    <div class="card w-100 card-shadow-none hoverable">
                        <img class="card-img-top" src="{{ asset('img/img_not_found.svg') }}" width="75" alt="ads">
                        <div class="card-body d-flex and flex-column">
                            <a class="card-text text-center mb-2" href="#">
                                Ads Here
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="col-md-10">
                <div class="card card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8 order-1">
                            <a href="{{ $post->featured_photo }}" class="glightbox">
                                <img class="img-fluid" src="{{ $post->featured_photo }}" title="click to view more photos">
                            </a>
                            <div class="collapse" id="view_photos">
                                @forelse ($post->getMedia('post_images') as $image)
                                    @if (!$loop->first)
                                        <a href="{{ $image->getUrl() }}" class="glightbox">
                                            <img class="img-fluid" src="{{ $image->getUrl() }}" width="100"
                                                alt="image">
                                        </a>
                                    @endif
                                @empty
                                    No Available Photos
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-4 order-2">
                            {{-- Check if its on flash barter --}}

                            @if (isOnFlashBarter($post->id))
                                <h2>{{ $post->title }} | {{ $post->category->name }} |
                                    {{ $post->user->full_name }} - On Flash Barter⚡!
                                </h2>
                            @else
                                <h2>{{ $post->title }} | {{ $post->category->name }} | {{ $post->user->full_name }}</h2>
                            @endif
                            <h4 class="font-weight-normal">{{ $post->category->name }}</h4>
                            <h4 class="font-weight-normal">Posted By: 
                                <a href="/barterers/{{ $post->user->id }}">
                                    {{ $post->user->full_name }} <img class="img-fluid rounded-circle ml-1"
                                        src="{{ handleNullAvatar($post->user->avatar_profile) }}" width="25"
                                        alt="avatar" title="{{ $post->user->full_name }}">
                                </a>
                            </h4>
                            <div>
                                {{-- Display User Ratings --}}
                                @if ($post->user->avg_ratings)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i > $post->user->avg_ratings)
                                            <i class="far fa-star text-warning"></i>
                                        @else
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                @else
                                    <i class="far fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                @endif
                                {{-- End  User Ratings --}}

                                <a class="text-primary" data-toggle="collapse" href="#show_reviews" role="button"
                                    aria-expanded="false" aria-controls="show_reviews">
                                    Barterer Reviews</a>
                                <div class="collapse mt-3" id="show_reviews">
                                    <div class="card card-body">
                                        @forelse ($post->user->ratings as $rating)
                                            <div class="d-flex justify-content-start align-items-center">
                                                <img class="rounded-circle"
                                                    src="{{ handleNullAvatar($rating->sender->avatar_profile) }}"
                                                    width="40" title="{{ $rating->sender->full_name }}">
                                                <div class="mx-3 w-100">
                                                    <div>
                                                        <a class="text-dark"
                                                            href="{{ route('main.barterers.show', $rating->sender->id) }}">
                                                            <p class="mb-0">{{ $rating->sender->full_name }}
                                                        </a>
                                                         <span
                                                                class="text-muted ml-1"> -
                                                                {{ formatDate($rating->created_at) }}</span>

                                                        </p>
                                                        <p>
                                                            {{ $rating->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!$loop->last)
                                                <hr>
                                            @endif
                                        @empty
                                            No Reviews Found!
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <br>
                            {{-- if post is on flash barter add a discount 25% --}}
                            @if (isOnFlashBarter($post->id))
                                <h3 class="font-weight-normal">Barter Value :
                                    ₱{{ number_format($post->value - $post->value * 0.25) }} only ⚡ | <span
                                        class="text-sm text-through">₱{{ $post->value }}</span></h3>
                            @else
                                <h3 class="font-weight-normal">Barter Value : ₱{{ $post->value }}</h3>
                            @endif
                            <h3 class="font-weight-normal">Address : {{ $post->user->address }} at
                                {{ $post->user->municipality->name }}</h3>
                            <h3 class="text-capitalize font-weight-normal">Shipping Options: {{ $post->shipping_options }}
                                <i class="fas fa-check ml-1">
                                </i>
                            </h3>
                            <h3 class="text-capitalize font-weight-normal">Tags:
                                @foreach (explode(',', $post->tags) as $tag)
                                    <span class="badge badge-primary mx-1">{{ $tag }}</span>
                                @endforeach

                            </h3>
                            <br>
                            @guest
                                <a class="btn btn-dark d-block w-100 mb-2" href="javascript:void(0)"
                                    onclick="alert('You need to login first')">Add
                                    Offer <i class="far fa-handshake ml-1"></i>
                                </a>
                            @endguest
                            @auth
                                {{-- only show buttons if the post is not yet bartered --}}
                                @if (!$post->is_bartered)
                                    {{-- Only enable this offering option if its not the owner of the post && it is not the administrator --}}
                                    @if (auth()->id() !== $post->user_id &&
                                        !auth()->user()->hasRole('admin'))
                                        <a class="btn btn-dark d-block w-100 mb-2"
                                            href="{{ route('user.barters.create', $post) }}">Add
                                            Offer <i class="far fa-handshake ml-1"></i>
                                        </a>

                                        <a class="btn btn-primary d-block w-100 mb-2"
                                            href="{{ route('user.messages.create') }}?user={{ $post->user_id }}">Message

                                            <i class="fab fa-facebook-messenger ml-1"></i>
                                        </a>
                                    @endif

                                    {{--  if not admin --}}
                                    @if (!auth()->user()->hasRole('admin'))
                                        @if (isMarkedAsFavoriteByAuthUser(auth()->id(), $post->favorites))
                                            <button class="btn btn-dark d-block w-100"
                                                onclick="confirm('Do you want to remove from favorites?', '', 'Yes').then(res => res.isConfirmed ? $('#favorite_form').submit() : false)"
                                                title="You mark this post as one of your favorite"><i
                                                    class="fas fa-trash mr-1"></i>
                                                Favorites
                                            </button>
                                            <form action="{{ route('user.favorites.destroy', $post) }}" method="POST"
                                                id="favorite_form">
                                                @csrf @method('DELETE')
                                                <input type="hidden" name="model_type" value="post">
                                            </form>
                                        @else
                                            <button class="btn btn-outline-dark d-block w-100"
                                                onclick="confirm('Do you want to mark as favorite?', '', 'Yes').then(res => res.isConfirmed ? $('#favorite_form').submit() : false)"><i
                                                    class="far fa-heart mr-1"></i> Favorites
                                            </button>
                                            <form action="{{ route('user.favorites.store') }}" method="POST"
                                                id="favorite_form">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <input type="hidden" name="model_type" value="post">
                                            </form>
                                        @endif
                                    @endif
                                @else
                                    <h1><span class="badge badge-danger">Posted Item Not Available <i
                                                class="fas fa-times ml-1"></i></span>
                                    </h1>
                                @endif
                            @endauth
                        </div>
                        <div class="col-12 col-md-8 order-3 mt-5 mt-md-3">
                            {!! $post->description !!}
                            <hr>
                            <h2 class="font-weight-normal"> <i class="fas fa-link mr-1"></i>
                                {{ Str::plural('Discussion', $post->comments->count()) }}
                                ({{ $post->comments->count() }})</h2>
                            {{-- Start Comment Row --}}
                            <div class="row" id="d_community_post">
                                <div class="w-100" id="post_row-1">
                                    <div class="col-md-12 pb-3">
                                        @auth
                                            <div class="d-flex justify-content-end">
                                                <div>
                                                    {{-- Comments count --}}
                                                    <span class="comments mr-1">
                                                        <span id="comment_count-{{ $post->id }}">
                                                            {{ $post->comments->count() }}
                                                        </span>
                                                        <span class="text-primary h5 ml-1" role="button">
                                                            <i class="far fa-comment-alt fa-lg"
                                                                onclick="showComments({{ $post->id }})"></i>
                                                        </span>
                                                    </span>
                                                    {{-- Likes  count --}}
                                                    <span class="likes mx-1">
                                                        <span id="like_count-{{ $post->id }}">
                                                            {{ $post->likes->count() }}
                                                        </span>
                                                        @if (isLikedByAuthUser(auth()->id(), $post->likes))
                                                            <span id="like_icon-{{ $post->id }}">
                                                                <span class="text-primary h5 ml-1" role="button"
                                                                    onclick="dislike({{ $post->id }})">
                                                                    <i class="fas fa-thumbs-up fa-lg"></i>
                                                                </span>
                                                            </span>
                                                        @else
                                                            <span id="like_icon-{{ $post->id }}">
                                                                <span class="text-primary h5 ml-1" role="button"
                                                                    onclick="like({{ $post->id }})">
                                                                    <i class="far fa-thumbs-up fa-lg"></i>
                                                                </span>
                                                            </span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <br>
                                                <form class="post_form" autocomplete="off">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <img class="rounded-circle avatar"
                                                            src="{{ handleNullAvatar(auth()->user()?->avatar_profile) }}"
                                                            alt="avatar.jpg">
                                                        <div class="input-group input-group-outline mt-3 mx-3 w-100 ">
                                                            <input class="form-control textarea" type="text"
                                                                id="comment_input-{{ $post->id }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-sm btn-outline-primary float-right" type="button"
                                                        onclick="addComment({{ $post->id }}, event)">Comment</button>

                                                </form>
                                                <br>

                                                <a href="javascript:void(0)">Most Recent <i
                                                        class="fas fa-caret-down ml-1"></i>
                                                </a>

                                                {{-- Comments --}}
                                                <div class="mt-5" id="d_comments-{{ $post->id }}"
                                                    style="display:none !important">
                                                    @foreach ($post->comments as $comment)
                                                        {{-- Comment Wrapper --}}
                                                        <div class="bg-lighter rounded" id="comment_row-{{ $comment->id }}">
                                                            <div
                                                                class="d-flex justify-content-start align-items-center p-2 mt-2">
                                                                <img class="rounded-circle"
                                                                    src="{{ handleNullAvatar($comment->user->avatar_profile) }}"
                                                                    width="30" data-toggle="tooltip" data-html="true"
                                                                    title="<div class='w-100 p-3 text-center">
                                                                <div class="mx-3 w-100">
                                                                    {{-- Comment Settings --}}
                                                                    @if (auth()->id() === $comment->user_id)
                                                                        <div class="px-2 float-right">
                                                                            <div
                                                                                class="dropdown d-flex justify-content-end text-right">
                                                                                <a class='btn btn-sm btn-icon-only text-light'
                                                                                    href='#' role='button'
                                                                                    data-toggle='dropdown'
                                                                                    data-display="static"
                                                                                    aria-expanded='false'>
                                                                                    <i class='fas fa-ellipsis-v'></i>
                                                                                </a>

                                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                                    aria-labelledby="dropdownMenu">
                                                                                    <button class="dropdown-item"
                                                                                        type="button"
                                                                                        onclick="editComment({{ $comment }})">Edit</button>
                                                                                    <button class="dropdown-item"
                                                                                        type="button"
                                                                                        onclick="removeComment({{ $post->id }}, {{ $comment->id }})">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="comment_body">
                                                                        <h4 class="font-weight-normal">
                                                                            <a class="text-dark" href="{{ route('main.barterers.show', $comment->user->id) }}">
                                                                                {{ $comment->user->full_name }}
                                                                            </a>
                                                                            
                                                                            <span class="text-muted ml-1"> -
                                                                                {{ $comment->created_at->longAbsoluteDiffForHumans() }}</span>

                                                                        </h4>
                                                                        <h4 class="font-weight-normal" id="d_comment">
                                                                            {{ $comment->comment }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End Comment Wrapper --}}
                                                    @endforeach
                                                </div>
                                            </div>
                                            {{-- End Comments --}}
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            {{-- End Comment Row --}}
                        </div>
                        <div class="col-md-4 order-4">
                            <br>
                            {{-- Only show this section if there is already an offered post / item --}}
                            @if ($post->barters->isNotEmpty())
                                {{-- Offers --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-body">
                                            <h3 class="font-weight-normal"><i class="fas fa-list mr-1"></i> List of Items
                                                Offered
                                            </h3>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Item</th>
                                                            {{-- Enable approval buttons if its the owner of the post --}}
                                                            @if ($post->user_id == auth()->id())
                                                                <th></th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($post->barters as $barter)
                                                            <tr>
                                                                <td>
                                                                    <img class="img-fluid"
                                                                        src="{{ handleNullFeaturedPhoto($barter->bartered_post->featured_photo) }}"
                                                                        width="120" alt="featured_photo">
                                                                </td>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('main.posts.show', $barter->bartered_post->slug) }}">{{ $barter->bartered_post->title }}
                                                                        - {{ $barter->bartered_post->user->full_name }}</a>
                                                                </td>

                                                                {{-- Enable approval buttons if its the owner of the post --}}
                                                                @if ($post->user_id == auth()->id())
                                                                    {{-- if the barter status is pending. enable buttons --}}
                                                                    @if ($barter->status == \App\Models\Barter::PENDING)
                                                                        <td>
                                                                            <div class='dropdown'>
                                                                                <a class='btn btn-sm btn-icon-only text-light'
                                                                                    href='#' role='button'
                                                                                    data-toggle='dropdown'
                                                                                    aria-haspopup='true'
                                                                                    aria-expanded='false'>
                                                                                    <i class='fas fa-ellipsis-v'></i>
                                                                                </a>
                                                                                <div
                                                                                    class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                                                                    <a class='dropdown-item'
                                                                                        href='javascript:void(0)'
                                                                                        onclick="promptUpdate(event, '#barter_accept_form', 'Do you want to accept the item offered by {{ $barter->bartered_post->user->full_name }}?', 'Make sure you double check the selected target. You cannot revert the result.', )">Accept
                                                                                        Offer
                                                                                    </a>
                                                                                    <a class='dropdown-item'
                                                                                        href='javascript:void(0)'
                                                                                        onclick="promptUpdate(event, '#barter_reject_form', 'Do you want to reject the item offered by {{ $barter->bartered_post->user->full_name }}?', 'Make sure you double check the selected target. You cannot revert the result.', )">Reject
                                                                                        Offer
                                                                                        Offer
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <form
                                                                                action="{{ route('user.barters.update', $barter) }}"
                                                                                method="POST" id="barter_accept_form">
                                                                                @csrf @method('PUT')
                                                                                <input type="hidden" name="status"
                                                                                    value="1">
                                                                            </form>
                                                                            <form
                                                                                action="{{ route('user.barters.update', $barter) }}"
                                                                                method="POST" id="barter_reject_form">
                                                                                @csrf @method('PUT')
                                                                                <input type="hidden" name="status"
                                                                                    value="2">
                                                                            </form>

                                                                        </td>
                                                                    @endif
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Offers --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    @auth
        <script src='{{ asset('assets/js/user/script.js') }}'></script>
    @endauth
    <script src="{{ asset('assets/js/utils/eone.min.js') }}"></script>
    <script>
        $(() => {
            $('.textarea').emojioneArea();
        })
        $('#bartering_nav').addClass('active');
    </script>
@endsection
