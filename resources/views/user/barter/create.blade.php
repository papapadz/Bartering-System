@extends('layouts.user.app')

@section('title', 'Albarter | Create Offer')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="text-primary" href="{{ route('user.barters.index') }}">
                            <i class='fas fa-arrow-left fa-lg'></i>
                        </a>
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('img/barter/default.svg') }}" alt="barter">
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-primary">Create Offer! ⚡</h1>
                                <h3 class="font-weight-normal">Barter what you have. Get what you need. Give what you can.
                                </h3>

                                @include('layouts.includes.alert')
                                <img class="img-fluid" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="150" alt="featured_photo">
                                <h3 class="font-weight-normal">Target Item: {{ $post->title }}</h3>
                                <h3 class="font-weight-normal">Category: {{ $post->category->name }}</h3>
                                <h3 class="font-weight-normal">Owner: <a class="text-dark"
                                        href="{{ route('main.barterers.show', $post->user->id) }}"> </a>{{ $post->user->full_name }}</h3>
                                <h3 class="font-weight-normal">Barter Value: ₱{{ $post->value }}</h3>
                                <br>
                                <fieldset>
                                    <legend>Select Item To Offer</legend>
                                    <form action="{{ route('user.barters.store', $post) }}" method="post" id="barter_form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <select class="form-control" name="bartered_post_id">
                                                <option value=""></option>
                                                @foreach ($offered_posts as $offered_post)
                                                    <option value="{{ $offered_post->id }}">{{ $offered_post->title }} -
                                                        ₱{{ $offered_post->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div>
                                            <button type="button" class="btn btn-primary form-control"
                                                onclick="promptStore(event,'#barter_form', 'Do you want to offer the selected item?', 'make sure you select the right item ⚡ ', 'Yes!')">Make
                                                Offer</button>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        $('#barter_nav').addClass('active');
    </script>
@endsection
