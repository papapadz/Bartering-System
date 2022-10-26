@extends('layouts.user.app')

@section('title', 'Albarter | Edit Post')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h2 class="font-weight-normal">
                            <a class="text-primary float-left mr-3" href="{{ route('user.posts.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            Edit Post <i class="fas fa-edit ml-1"></i>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('layouts.includes.alert')
                                <form action="{{ route('user.posts.update', $post) }}" method="post" id="post_form"
                                    enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="form-group mb-2">
                                        <label class="form-label">Category *</label>
                                        <select class="form-control" name="category_id">
                                            <option value=""></option>
                                            @foreach ($categories as $id => $category)
                                                <option value="{{ $id }}"
                                                    @if ($post->category_id == $id) selected @endif>
                                                    {{ $category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Title *</label>
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Name of the Posted Item (Eg. 3kgs of Rice)"
                                            value="{{ $post->title }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea class="form-control" name="description" id="description_textarea" rows="10">{{ $post->description }}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Condition *</label>
                                        <select class="form-control" name="condition">
                                            <option value=""></option>
                                            <option value="good" @if ($post->condition == 'good') selected @endif>Good
                                            </option>
                                            <option value="very good" @if ($post->condition == 'very good') selected @endif>Very
                                                Good</option>
                                            <option value="excellent" @if ($post->condition == 'excellent') selected @endif>
                                                Excellent</option>
                                            <option value="brand new" @if ($post->condition == 'brand new') selected @endif>
                                                Brand New</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Barter Value (₱) *</label>
                                        <input class="form-control" type="number" min="0" name="value"
                                            value="{{ $post->value }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Tags (Comma separated) *</label>
                                        <input class="form-control" type="text" name="tags"
                                            placeholder="Ex: rice,local,fresh" value="{{ $post->tags }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Shipping Options *</label>
                                        <select class="form-control" name="shipping_options">
                                            <option value=""></option>
                                            <option value="meetup" @if ($post->shipping_options == 'meetup') selected @endif>Only
                                                meetup</option>
                                            <option value="nationwide shipping"
                                                @if ($post->shipping_options == 'nationwide shipping') selected @endif>Only
                                                Nationwide Shipping
                                            </option>
                                            <option value="meetup and nationwide shipping"
                                                @if ($post->shipping_options == 'meetup and nationwide shipping') selected @endif>Meetup &
                                                Nationwide
                                                Shipping
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <input class="post_images" type="file" name="image[]" data-allow-reorder="true"
                                            data-max-files="5" multiple>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary form-control"
                                            onclick="promptUpdate(event,'#post_form', 'Do you want to Update?', 'Note: Uploading new images will overwrite the existing one', 'Yes')">Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ asset('img/post/default.svg') }}">
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
    <script script src="https://cdn.tiny.cloud/1/yiv2clsvcw9c4q7y2h8t92t4cuaia1l3383axmfdgovo3kft/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        initiateFilePond('.post_images')
        initiateEditor('textarea')
        $('#post_management_nav').addClass('active');
    </script>
@endsection
