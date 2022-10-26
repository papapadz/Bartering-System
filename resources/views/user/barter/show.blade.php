@extends('layouts.user.app')

@section('title', 'Albarter | Barter Info')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.barters.index') }}">All Barter</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $barter->bartered_post->title }} |
                    {{ $barter->post->title }}</li>
            </ol>
        </nav>

        {{-- if the auth user is target barterer, show this layout --}}
        @if ($barter->post->user_id == auth()->id())
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-self-stretch">
                    <div class="card w-100">
                        <div class="card-header bg-dark text-white">
                            My Post
                        </div>
                        <div class="card-body d-flex and flex-column">
                            <a href="{{ $barter->post->featured_photo }}" class="glightbox">
                                <img class="img-fluid d-block mx-auto" src="{{ $barter->post->featured_photo }}"
                                    width="300" title="click to view more photos">
                            </a>
                            @forelse ($barter->post->getMedia('post_images') as $image)
                                @if (!$loop->first)
                                    <a href="{{ $image->getUrl() }}" class="glightbox">
                                        <img class="img-fluid" src="{{ $image->getUrl() }}" width="100" alt="image">
                                    </a>
                                @endif
                            @empty
                                No Available Photos
                            @endforelse
                            <hr>
                            <h4 class="font-weight-normal">Barterer: <img class="img-fluid"
                                    src="{{ handleNullAvatar($barter->post->user->avatar_profile) }}" width="30"
                                    alt="avatar"> <a class="text-dark" href="{{ route('main.barterers.show', $barter->post->user->id) }}">
                                        {{  $barter->post->user->full_name }}
                                    </a>
                            </h4>
                            <h4 class="font-weight-normal">Title:
                                <a href="{{ route('main.posts.show', $barter->post->slug) }}"
                                    style='text-decoration:underline'>
                                    {{ $barter->post->title }}
                                </a>
                            </h4>
                            <h4 class="font-weight-normal">Category: {{ $barter->post->category->name }}</h4>
                            <h4 class="font-weight-normal">Value: ₱ {{ $barter->post->value }}</h4>
                            <h4 class="font-weight-normal">Address: {{ $barter->post->user->address }} at
                                {{ $barter->post->user->municipality->name }}
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-self-stretch">
                    <div class="card w-100">
                        <div class="card-header bg-dark text-white">
                            Offered Post
                        </div>
                        <div class="card-body d-flex and flex-column">
                            <a href="{{ $barter->bartered_post->featured_photo }}" class="glightbox">
                                <img class="img-fluid d-block mx-auto" src="{{ $barter->bartered_post->featured_photo }}"
                                    width="300" title="click to view more photos">
                            </a>
                            @forelse ($barter->bartered_post->getMedia('post_images') as $image)
                                @if (!$loop->first)
                                    <a href="{{ $image->getUrl() }}" class="glightbox">
                                        <img class="img-fluid" src="{{ $image->getUrl() }}" width="100" alt="image">
                                    </a>
                                @endif
                            @empty
                                No Available Photos
                            @endforelse
                            <hr>
                            <h4 class="font-weight-normal">Barterer: <img class="img-fluid"
                                    src="{{ handleNullAvatar($barter->bartered_post->user->avatar_profile) }}"
                                    width="30" alt="avatar"> <a class="text-dark"
                                    href="{{ route('main.barterers.show', $barter->bartered_post->user->id) }}">
                                    {{ $barter->bartered_post->user->full_name }}
                                </a>
                            </h4>
                            <h4 class="font-weight-normal">Title:
                                <a href="{{ route('main.posts.show', $barter->bartered_post->slug) }}"
                                    style='text-decoration:underline'>
                                    {{ $barter->bartered_post->title }}
                                </a>
                            </h4>
                            <h4 class="font-weight-normal">Category: {{ $barter->bartered_post->category->name }}</h4>
                            <h4 class="font-weight-normal">Value: ₱ {{ $barter->bartered_post->value }}</h4>
                            <h4 class="font-weight-normal">Address: {{ $barter->bartered_post->user->address }} at
                                {{ $barter->bartered_post->user->municipality->name }}
                            </h4>

                        </div>
                    </div>
                </div>

            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-self-stretch">
                    <div class="card w-100">
                        <div class="card-header bg-dark text-white">
                            My Post
                        </div>
                        <div class="card-body d-flex and flex-column">
                            <a href="{{ $barter->bartered_post->featured_photo }}" class="glightbox">
                                <img class="img-fluid d-block mx-auto" src="{{ $barter->bartered_post->featured_photo }}"
                                    width="300" title="click to view more photos">
                            </a>
                            @forelse ($barter->bartered_post->getMedia('post_images') as $image)
                                @if (!$loop->first)
                                    <a href="{{ $image->getUrl() }}" class="glightbox">
                                        <img class="img-fluid" src="{{ $image->getUrl() }}" width="100" alt="image">
                                    </a>
                                @endif
                            @empty
                                No Available Photos
                            @endforelse
                            <hr>
                            <h4 class="font-weight-normal">Barterer: <img class="img-fluid"
                                    src="{{ handleNullAvatar($barter->bartered_post->user->avatar_profile) }}"
                                    width="30" alt="avatar"> <a class="text-dark"
                                    href="{{ route('main.barterers.show', $barter->bartered_post->user->id) }}">
                                    {{ $barter->bartered_post->user->full_name }}
                                </a>
                            </h4>
                            <h4 class="font-weight-normal">Title: {{ $barter->bartered_post->title }}</h4>
                            <h4 class="font-weight-normal">Category: {{ $barter->bartered_post->category->name }}</h4>
                            <h4 class="font-weight-normal">Value: ₱ {{ $barter->bartered_post->value }}</h4>
                            <h4 class="font-weight-normal">Address: {{ $barter->bartered_post->user->address }} at
                                {{ $barter->bartered_post->user->municipality->name }}
                            </h4>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex align-self-stretch">
                    <div class="card w-100">
                        <div class="card-header bg-dark text-white">
                            Target Post
                        </div>
                        <div class="card-body d-flex and flex-column">
                            <a href="{{ $barter->post->featured_photo }}" class="glightbox">
                                <img class="img-fluid d-block mx-auto" src="{{ $barter->post->featured_photo }}"
                                    width="300" title="click to view more photos">
                            </a>
                            @forelse ($barter->post->getMedia('post_images') as $image)
                                @if (!$loop->first)
                                    <a href="{{ $image->getUrl() }}" class="glightbox">
                                        <img class="img-fluid" src="{{ $image->getUrl() }}" width="100"
                                            alt="image">
                                    </a>
                                @endif
                            @empty
                                No Available Photos
                            @endforelse
                            <hr>
                            <h4 class="font-weight-normal">Barterer: <img class="img-fluid"
                                    src="{{ handleNullAvatar($barter->post->user->avatar_profile) }}" width="30"
                                    alt="avatar">
                                <a class="text-dark"
                                    href="{{ route('main.barterers.show', $barter->post->user->id) }}">
                                    {{ $barter->post->user->full_name }}
                                </a>
                            </h4>
                            <h4 class="font-weight-normal">Title: {{ $barter->post->title }}</h4>
                            <h4 class="font-weight-normal">Category: {{ $barter->post->category->name }}</h4>
                            <h4 class="font-weight-normal">Value: ₱ {{ $barter->post->value }}</h4>
                            <h4 class="font-weight-normal">Address: {{ $barter->post->user->address }} at
                                {{ $barter->post->user->municipality->name }}
                            </h4>
                        </div>
                    </div>
                </div>



            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header bg-dark text-white" style="font-size: 20px"><span
                            class="text-center">{!! handleBarterStatus($barter->status) !!} - <span
                                style="font-size: 17px !important">{{ formatDate($barter->created_at, 'dateTime') }}
                            </span> </span> </div>
                    <div class="card-body">

                        {{-- @if ($barter->status == \App\Models\Barter::PENDING)
                            <img class="img-fluid d-block mx-auto" src="{{ asset('img/barter/pending.svg') }}"
                                width="600" alt="waiting">
                        @elseif($barter->status == \App\Models\Barter::ACCEPTED)
                            <img class="img-fluid d-block mx-auto" src="{{ asset('img/barter/bartered.svg') }}"
                                width="600" alt="bartered">
                        @else
                            <img class="img-fluid d-block mx-auto" src="{{ asset('img/barter/rejected.svg') }}"
                                width="600" alt="rejected">
                        @endif --}}

                        @include('layouts.includes.alert')

                        {{-- if the auth user is target barterer --}}
                        @if ($barter->post->user_id === auth()->id())
                            {{-- if the barter status is pending. enable buttons --}}
                            @if ($barter->status == \App\Models\Barter::PENDING)
                                <div>
                                    <button type="button" class="btn btn-success"
                                        onclick="promptUpdate(event, '#barter_accept_form', 'Do you want to accept the item offered by {{ $barter->bartered_post->user->full_name }}?', 'Make sure you double check the selected target. You cannot revert the result.', )">Accept
                                    </button>

                                    <button type="button" class="btn btn-danger"
                                        onclick="promptUpdate(event, '#barter_reject_form', 'Do you want to reject the item offered by {{ $barter->bartered_post->user->full_name }}?', 'Make sure you double check the selected target. You cannot revert the result.', )">Reject
                                    </button>

                                </div>
                                <form action="{{ route('user.barters.update', $barter) }}" method="POST"
                                    id="barter_accept_form">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status" value="1">
                                </form>
                                <form action="{{ route('user.barters.update', $barter) }}" method="POST"
                                    id="barter_reject_form">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="status" value="2">
                                </form>
                            @endif

                            {{-- if the barter status is accepted. enable ratings option --}}
                            @if ($barter->status == \App\Models\Barter::ACCEPTED)
                                <fieldset>
                                    <legend>
                                        <h3 class="font-weight-normal text-left">How's your bartering transaction with
                                            {{ $barter->bartered_post->user->full_name }}?
                                        </h3>
                                    </legend>
                                    <form action="{{ route('user.ratings.store') }}" method="POST" id="rate_form">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <select class="star-rating" name="rating" style="display:none">
                                                <option value="">Select a rating</option>
                                                <option value="5">Excellent</option>
                                                <option value="4">Very Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Poor</option>
                                                <option value="1">Terrible</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <textarea class="form-control" name="comment" rows="5"
                                                placeholder="Add a comment for this barterer. Let's help one another by giving a feedback from our recent activity."></textarea>
                                        </div>

                                        {{-- if the auth user is target barterer, rate the offerer --}}

                                        @if ($barter->post->user_id == auth()->id())
                                            <input type="hidden" name="receiver_id"
                                                value="{{ $barter->bartered_post->user_id }}">
                                        @endif

                                        {{-- if the auth user is offerer , rate the owner or target barterer --}}

                                        @if ($barter->bartered_post->user_id == auth()->id())
                                            <input type="hidden" name="receiver_id"
                                                value="{{ $barter->post->user_id }}">
                                        @endif

                                        <div>
                                            <button type="button" class="btn btn-success d-block w-100"
                                                onclick="promptStore(event,'#rate_form')">Submit</button>
                                        </div>
                                    </form>
                                </fieldset>
                            @endif

                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- End CONTAINER --}}

@endsection
@section('script')
    <script>
        var stars = new StarRating('.star-rating');

        $('#barter_nav').addClass('active')
    </script>
@endsection
