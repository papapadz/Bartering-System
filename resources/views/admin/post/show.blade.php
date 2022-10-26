@extends('layouts.admin.app')

@section('title', "Admin | $post->title")

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
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">All Post</a></li>
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
                    <h2>{{ $post->title }} | {{ $post->category->name }} | {{ $post->user->name }}</h2>
                    <h4 class="font-weight-normal">{{ $post->category->name }}</h4>
                    <h4 class="font-weight-normal">by
                        <a href="#">{{ $post->user->full_name }}</a>
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
                            Artist Reviews</a>
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
                    <h2>₱{{ $post->value }}</h2>
                    <h3 class="text-capitalize">Shipping Options: {{ $post->shipping_options }}
                        <i class="fas fa-check ml-1">
                        </i>
                    </h3>
                    <a class="btn btn-primary d-block w-100" href="#">Message <i
                            class="fab fa-facebook-messenger ml-1"></i></a>
                    <br>
                </div>
                <div class="col-12 col-md-8 order-3 mt-5 mt-md-3">
                    {!! $post->description !!}
                </div>
                <div class="col-md-4 order-4">
                    <hr class="d-block d-md-none">

                    <fieldset>
                        <legend>
                            <h2 class="font-weight-normal">Manage Post <i class="fas fa-cog ml-1"></i></h2>
                        </legend>
                        <form action="{{ route('admin.posts.update', $post) }}" method="post" id="post_form">
                            @csrf @method('PUT')
                            @include('layouts.includes.alert')
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="remark" rows="5" placeholder="Add Remark (Optional)">{{ $post->remark }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control" name="status" required>
                                    <option value="">--Select Status--</option>
                                    <option value="1" @if ($post->status == \App\Models\Post::APPROVED) selected @endif>
                                        Approve
                                        Request</option>
                                    <option value="2" @if ($post->status == \App\Models\Post::REJECTED) selected @endif>
                                        Reject
                                        Request</option ion>
                                </select>
                            </div>
                            <button class="btn btn-primary float-end" type="button"
                                onclick="event.preventDefault();confirm('Do you want to Update Status?', '', 'Yes').then(res => res.isConfirmed ? $('#post_form').submit() : false )">
                                Save
                            </button>
                        </form>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script></script>
@endsection
