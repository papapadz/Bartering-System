@extends('layouts.user.app')

@section('title', 'Albarter | Manage Post')

@section('content')
    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <a class="float-left" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        Toggle to Advanced Search <i class="fas fa-list ml-1"></i>
                    </a>
                    <a class="float-right btn btn-sm btn-primary" href="{{ route('user.posts.create') }}">Create
                        Post +</a>
                </div>
                <br><br>
                <div class="collapse mt-2" id="collapseExample">
                    <div class="card card-body">
                        <form action="{{ route('user.posts.index') }}" method="get">
                            <div class="row mb-2 d-flex align-items-center">
                                <div class="col-md-3">
                                    <div class="form-group mb-1">
                                        <input class="form-control form-control-sm" type="search" name="title"
                                            placeholder="Enter Posted Item Name " value="{{ request('title') }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group mb-1">
                                        <select class="form-control form-control-sm" name="category" id="category">
                                            <option value="" selected>--- Category ---
                                            </option>
                                            @foreach ($categories as $id => $category)
                                                <option value="{{ $id }}"
                                                    @if (request('category') == $id) selected @endif>{{ $category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-1">
                                        <label class="text-sm" for="min">Min - <span id="min_range">₱
                                                {{ request('min') }}</span></label>
                                        <input type="range" class="form-control-range" name="min" min="0"
                                            max="10000" value="{{ request('min') ?? 0 }}" id="min"
                                            onchange="checkPrice(this, '#min_range')">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-1">
                                        <label class="text-sm" for="max">Max - <span id="max_range">₱
                                                {{ request('max') }}</span></label>
                                        <input type="range" class="form-control-range" name="max" min="0"
                                            max="10000" value="{{ request('max') ?? 0 }}" id="max"
                                            onchange="checkPrice(this, '#max_range')">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-primary d-block w-100">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('layouts.includes.alert')
            <div class="row mt-3">
                @forelse ($posts as $post)
                    @if ($posts->count() > 1)
                        <div class="col-6 col-md-4 col-lg-2 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="120" alt="post">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2 text-dark"
                                        href="{{ route('user.posts.show', $post) }}">
                                        <span class="">
                                            {{ $post->title }}
                                        </span>
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <p class="text-dark">
                                                <img src="{{ handleNullAvatar(auth()->user()->avatar_thumbnail) }}"
                                                    alt="avatar.svg" width="25">
                                                <span class="ml-1">
                                                    {{ formatDate(auth()->user()->created_at) }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="text-primary">
                                            <a href="{{ route('user.posts.edit', $post) }}"> <i
                                                    class="fas fa-edit text-primary ml-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="120" alt="post">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2 text-dark"
                                        href="{{ route('user.posts.show', $post) }}">
                                        <span class="">
                                            {{ $post->title }}
                                        </span>
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <p class="text-dark">
                                                <img src="{{ handleNullAvatar(auth()->user()->avatar_thumbnail) }}"
                                                    alt="avatar.svg" width="25">
                                                <span class="ml-1">
                                                    {{ auth()->user()->first_name }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="text-primary">
                                            <a href="{{ route('user.posts.edit', $post) }}"> <i
                                                    class="fas fa-edit text-primary ml-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-md-12">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" width="600"
                            alt="no data">
                        <h3 class="text-center font-weight-normal">Oops! Posted Item not found,
                            would you like to <a class="text-primary font-weight-bold"
                                href="{{ route('user.posts.create') }}">Create One?</a>
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    </div>
    {{-- End CONTAINER --}}


@endsection
@section('script')
    <script>
        function checkPrice(range, el) {
            if (range.value) {
                $(el).html(`₱ ${range.value}`)
            } else {
                $(el).html(``)
            }
        }
        $('#post_management_nav').addClass('active');
    </script>
@endsection
