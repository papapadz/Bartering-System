@extends('layouts.admin.app')

@section('title', "Admin | $announcement->title")

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.announcements.index') }}">All Announcement</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $announcement->title }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $announcement->title }}</h2><br>
                        {!! $announcement->content !!}
                        <br>
                        <h4 class="text-muted" data-toggle="collapse" data-target="#view_photos" style="cursor: pointer"
                            title="click to view photos"><i class="fas fa-link mr-1"> </i>
                            View Photos
                        </h4>
                        <br>

                        <div class="collapse" id="view_photos">
                            @forelse ($announcement->getMedia('announcement_images') as $image)
                                <a href="{{ $image->getUrl() }}" class="glightbox">
                                    <img class="img-fluid" src="{{ $image->getUrl() }}" width="100" alt="image">
                                </a>
                            @empty
                                No Available Photos
                            @endforelse
                        </div>

                        <br>
                        <p class="card-text">
                            <small class="text-muted">Last updated
                                {{ is_null($announcement->updated_at) ? $announcement->created_at->diffForHumans() : $announcement->updated_at->diffForHumans() }}
                                <i class="fas fa-clock ml-1"></i>
                            </small>
                        </p>
                    </div>
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

        $('#announcement_nav').addClass('active')
    </script>
@endsection
