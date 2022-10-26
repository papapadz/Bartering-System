@extends('layouts.main.app')

@section('title', "Albarter | $barterer->first_name")

{{-- @section('styles')
    <style>
        body {
            background: #fff !important;
        }
    </style>
@endsection --}}

@section('content')
    <br>
    {{-- CONTAINER --}}
    <div class="container mt-10 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main.barterers.index') }}">All Barterer</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $barterer->full_name }}</li>
            </ol>
        </nav>
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-body">
                    <img class="img-fluid" src="{{ handleNullAvatar($barterer->avatar_profile) }}" width="200"
                        title="click to view more photos">
                    <br><br>
                    <h2>Name: {{ $barterer->full_name }}</h2>
                    <h3 class="font-weight-normal">Contact: {{ $barterer->contact }}</h3>
                    <h3 class="font-weight-normal">Email: {{ $barterer->email }}</h3>
                    <h3 class="font-weight-normal">Address: {{ $barterer->address }}</h3>
                    <h3 class="font-weight-normal">Municipality: {{ $barterer->municipality->name }}</h3>
                    <h3 class="font-weight-normal">Date Registered: {{ formatDate($barterer->created_at) }}</h3><br>
                    <div>
                        @if ($barterer->avg_ratings)
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i > $barterer->avg_ratings)
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
                        <a class="text-primary" data-toggle="collapse" href="#show_reviews" role="button"
                            aria-expanded="false" aria-controls="show_reviews">
                            Barterer Reviews</a>
                        <div class="collapse mt-3" id="show_reviews">
                            <div class="card card-body">
                                @forelse ($barterer->ratings as $rating)
                                    <div class="d-flex justify-content-start align-items-center p-2 mt-2">
                                        <img class="rounded-circle" style="margin-top: -25px !important"
                                            src="{{ handleNullAvatar($rating->sender->avatar_profile) }}" width="30">
                                        <div class="mx-3 w-100">
                                            <div>
                                                <p class="mb-0"><a class="text-dark"
                                                        href="{{ route('main.barterers.show', $rating->sender->id) }}">
                                                        {{ $rating->sender->full_name }}
                                                    </a>

                                                <span class="text-muted ml-1"> -
                                                    {{ formatDate($rating->created_at) }}</span>

                                                </p>
                                                <p>
                                                    {{ $rating->comment }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    No Reviews Found!
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <br><br>

                    @if (Auth::check())
                        @if (auth()->user()->role->name == 'user')
                            <a class="btn btn-primary d-block w-100 mb-2"
                                href="{{ route('user.messages.create') }}?user={{ $barterer->id }}">Message <i
                                    class="fab fa-facebook-messenger ml-1"></i>
                            </a>
                            @auth

                                @if (isMarkedAsFavoriteByAuthUser(auth()->id(), $barterer->favorites))
                                    <button class="btn btn-dark d-block w-100"
                                        onclick="confirm('Do you want to remove from favorites?', '', 'Yes').then(res => res.isConfirmed ? $('#favorite_form').submit() : false)"
                                        title="You mark this barterer as one of your favorite"><i class="fas fa-trash mr-1"></i>
                                        Favorites
                                    </button>
                                    <form action="{{ route('user.favorites.destroy', $barterer) }}" method="POST"
                                        id="favorite_form">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="model_type" value="user">
                                    </form>
                                @else
                                    <button class="btn btn-outline-primary d-block w-100"
                                        onclick="confirm('Do you want to mark as favorite?', '', 'Yes').then(res => res.isConfirmed ? $('#favorite_form').submit() : false)"><i
                                            class="far fa-heart mr-1"></i> Favorites
                                    </button>
                                    <form action="{{ route('user.favorites.store') }}" method="POST" id="favorite_form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $barterer->id }}">
                                        <input type="hidden" name="model_type" value="user">
                                    </form>
                                @endif

                            @endauth
                        @endif
                    @endif


                </div>

            </div>
        </div>
        <h3>Recent Barter Posts:</h3> <br>
        <div class="row">
            @forelse ($barterer->posts as $post)
                <div class="col-6 col-md-4 col-lg-3 d-flex align-self-stretch">

                    <div class="card w-100 card-shadow-none hoverable">
                        <a href="{{ $post->featured_photo }}" class="glightbox"
                            data-gallery='gallery-{{ $post->id }}'>

                            <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                width="120" alt="artist">
                        </a>
                        <div class="card-body d-flex and flex-column">
                            <h3 class="font-weight-normal text-center mb-2 text-capitalize">
                                <a href="{{ route('main.posts.show', $post) }}"> {{ $post->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @empty
                Record Not Found
            @endforelse
        </div>
        <br><br>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        const lightbox = GLightbox({
            selector: '.glightbox',
        });
    </script>
@endsection
