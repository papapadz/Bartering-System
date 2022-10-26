@extends('layouts.main.app')

@section('title', 'Albarter | Barter Posts')


@section('content')
    {{-- CONTAINER --}}
    <div class="container-fluid mt-10 mb-3"> <br>
        <a class="mb-3 d-block d-lg-none" data-toggle="collapse" href="#toggle_search" role="button" aria-expanded="false"
            aria-controls="toggle_search">
            Toggle to Advanced Search <i class="fas fa-list ml-1"></i>
        </a>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-lg-4 col-xl-2" class="collapse" id="toggle_search">
                <div class="card card-body">
                    <form action="{{ route('main.posts.index') }}" method="get">
                        <div class="form-group mb-1">
                            <input class="form-control" type="search" name="title" placeholder="Enter Posted Item Name"
                                value="{{ request('title') }}">
                        </div>
                        <div class="form-group mb-2">
                            <select class="form-control" name="category">
                                <option value="" selected>--- All Category ---
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (request('category') == $category->id) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <select class="form-control" name="barterer">
                                <option value="" selected>--- All Barterer ---
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if (request('barterer') == $user->id) selected @endif>
                                        {{ $user->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group mb-2">
                            <input class="form-control" type="text" name="date_started_at" placeholder="Date Started"
                                onfocus="(this.type = 'date')">
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" type="text" name="date_ended_at" placeholder="Date Ended"
                                onfocus="(this.type = 'date')">
                        </div> --}}
                        <div class="form-group mb-2">
                            <label class="text-sm" for="min">Min - <span id="min_range">₱
                                    {{ request('min') }}</span></label>
                            <input type="range" class="form-control-range" name="min" min="0" max="10000"
                                value="{{ request('min') ?? 0 }}" id="min" onchange="checkPrice(this, '#min_range')">
                        </div>
                        <div class="form-group mb-2">
                            <label class="text-sm" for="max">Max - <span id="max_range">₱
                                    {{ request('max') }}</span></label>
                            <input type="range" class="form-control-range" name="max" min="0" max="10000"
                                value="{{ request('max') ?? 0 }}" id="max" onchange="checkPrice(this, '#max_range')">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary d-block w-100">Search</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-10">
                <h2> <i class="fas fa-link mr-1"></i> Top Posts ⚡</h2> <br>
                <div class="row">
                    @forelse ($boosted_posts as $post)
                        <div class="col-6 col-md-4 col-lg-3 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="120" alt="post">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2 text-dark"
                                        href="{{ route('main.posts.show', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <p class="text-dark">
                                                <img class="img-fluid rounded-circle"
                                                    src="{{ handleNullAvatar($post->user->avatar_thumbnail) }}"
                                                    alt="avatar" width="30">
                                                <span class="ml-1">
                                                    <a class="text-dark"
                                                        href="{{ route('main.barterers.show', $post->user) }}">
                                                        {{ $post->user->first_name }}
                                                    </a>
                                                </span>
                                            </p>
                                            <p class="text-dark" style="font-size: 15px">
                                                <img src="{{ asset('img/location.png') }}"
                                                    width="30" alt="location">
                                                {{ $post->user->municipality->name }}
                                            </p>
                                        </div>

                                        <div class="text-dark d-none d-md-block">
                                            <span class="mr-1"> {{ $post->comments->count() }} <i
                                                    class="far fa-comment text-dark"></i></span>
                                            <span> {{ $post->likes->count() }} <i
                                                    class="far fa-thumbs-up text-dark"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" width="600"
                                alt="no data">
                            <h3 class="text-center font-weight-normal">Oops! Records not found,
                            </h3>
                        </div>
                    @endforelse
                </div>
                <hr>
                <h2><i class="fas fa-link mr-1"></i> Others</h2><br>
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-6 col-md-4 col-lg-3 d-flex align-self-stretch  ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="120" alt="post">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2 text-dark"
                                        href="{{ route('main.posts.show', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <p class="text-dark">
                                                <img class="img-fluid rounded-circle"
                                                    src="{{ handleNullAvatar($post->user->avatar_thumbnail) }}"
                                                    alt="avatar" width="30">
                                                <span class="ml-1">
                                                    <a class="text-dark"
                                                        href="{{ route('main.barterers.show', $post->user) }}">
                                                        {{ $post->user->first_name }}
                                                    </a>
                                                </span>
                                            </p>
                                            <p class="text-dark" style="font-size: 15px">
                                                <img src="{{ asset('img/location.png') }}"
                                                    width="30" alt="location">
                                                {{ $post->user->municipality->name }}
                                            </p>
                                        </div>

                                        <div class="text-dark d-none d-md-block">
                                            <span class="mr-1"> {{ $post->comments->count() }} <i
                                                    class="far fa-comment text-dark"></i></span>
                                            <span> {{ $post->likes->count() }} <i
                                                    class="far fa-thumbs-up text-dark"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" width="600"
                                alt="no data">
                            <h3 class="text-center font-weight-normal">Oops! Records not found,
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
        $('#trading_nav').addClass('active');
    </script>
@endsection
