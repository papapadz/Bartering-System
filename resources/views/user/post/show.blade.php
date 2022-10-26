@extends('layouts.user.app')

@section('title', "Albarter | $post->title")

{{-- @section('styles')
    <style>
        body {
            background: #fff !important;
        }
    </style>
@endsection --}}

@section('content')
    {{-- CONTAINER --}}
    <div class="container-fluid mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.posts.index') }}">All Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>
        @include('layouts.includes.alert')
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
                                    <img class="img-fluid" src="{{ $image->getUrl() }}" width="100" alt="image">
                                </a>
                            @endif
                        @empty
                            No Available Photos
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4 order-2">
                    <h2>{{ $post->title }} | {{ $post->category->name }} | {{ $post->user->full_name }}</h2>
                    <h4 class="font-weight-normal">{{ $post->category->name }}</h4>
                    <h4 class="font-weight-normal">Posted By:
                        <a href="#">
                            {{ $post->user->full_name }} <img class="img-fluid rounded-circle ml-1"
                                src="{{ handleNullAvatar($post->user->avatar_profile) }}" width="25" alt="avatar"
                                title="{{ $post->user->full_name }}">
                        </a>
                    </h4>
                    <div>
                        {{-- Display User Ratings --}}
                        <i class="far fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        {{-- End  User Ratings --}}

                        <a class="text-warning" data-toggle="collapse" href="#show_reviews" role="button"
                            aria-expanded="false" aria-controls="show_reviews">
                            User Reviews</a>
                        <div class="collapse mt-3" id="show_reviews">
                            <div class="card card-body">
                                <div class="d-flex justify-content-start align-items-center p-2 mt-2">
                                    <img class="rounded-circle" src="{{ asset('img/noimg.svg') }}" width="30">
                                    <div class="mx-3 w-100">
                                        <div>
                                            <p class="mb-0">Jane Doe <span class="text-muted ml-1"> -
                                                    {{ formatDate(now()) }}</span>

                                            </p>
                                            <p>
                                                Test Review Comment
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h3 class="font-weight-normal">Barter Value : ₱{{ $post->value }}</h3>
                    <h3 class="text-capitalize font-weight-normal">Shipping Options: {{ $post->shipping_options }}
                        <i class="fas fa-check ml-1">
                        </i>
                    </h3>
                    <h3 class="text-capitalize font-weight-normal">Tags:
                        @foreach (explode(',', $post->tags) as $tag)
                            <span class="badge badge-warning mx-1">{{ $tag }}</span>
                        @endforeach

                    </h3>

                    <h3 class="font-weight-normal">Status: {!! handlePostStatus($post->status) !!}</h3>
                    <br>
                </div>
                <div class="col-12 col-md-8 order-3 mt-5 mt-md-3">
                    {!! $post->description !!}
                </div>
                <div class="col-md-4 order-4">

                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        const lightbox = GLightbox({
            selector: '.glightbox'
        });

        $('#post_management_nav').addClass('active');
    </script>
@endsection
