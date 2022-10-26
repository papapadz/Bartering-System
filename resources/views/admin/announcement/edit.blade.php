@extends('layouts.admin.app')

@section('title', 'Admin | Edit Announcement')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h2 class="font-weight-normal">
                            <a class="text-primary float-left mr-3" href="{{ route('admin.announcements.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            Edit Announcement <i class="far fa-edit ml-1"></i>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <form action="{{ route('admin.announcements.update', $announcement) }}" method="post"
                                    enctype="multipart/form-data" id="announcement_form">
                                    @csrf @method('PUT')
                                    @include('layouts.includes.alert')
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" name="title" placeholder="Add Title"
                                            value="{{ $announcement->title }}">
                                    </div>

                                    <div class="form-group mb-2">
                                        <textarea class="form-control" name="content" id="content_txtarea" rows="10">{!! $announcement->content !!}</textarea>
                                    </div>

                                    <div class="mb-2">
                                        <input type="file" class="content_images" name="image[]" multiple
                                            data-allow-reorder="true" data-max-file-size="1MB" data-max-files="10">
                                    </div>


                                    <button type="button" class="btn btn-sm btn-primary form-control"
                                        onclick="promptUpdate(event,'#announcement_form', 'Do you want to Update?', 'Note: Uploading new images will overwrite the existing one', 'Yes')">
                                        Save
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <img class="img-fluid" src="{{ asset('img/announcement/default.svg') }}" alt="announcement">
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/yiv2clsvcw9c4q7y2h8t92t4cuaia1l3383axmfdgovo3kft/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        initiateFilePond('.content_images')
        initiateEditor('textarea', 'Add description about your announcement')

        $('#announcement_nav').addClass('active')
    </script>
@endsection
