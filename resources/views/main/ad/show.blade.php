@extends('layouts.main.app')

@section('title', "Advertisement | $ad->title")

@section('content')

    {{-- CONTAINER --}}
    <div class="container mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ $ad->title }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            <a class="text-primary" href="{{ $ad->link }}" target="_blank">{{ $ad->title }}</a>
                        </h2><br>
                        {!! $ad->content !!}
                        <br>
                        <h4 class="text-muted" data-toggle="collapse" data-target="#view_photos" style="cursor: pointer"
                            title="click to view photos"><i class="fas fa-link mr-1"> </i>
                            View Photos
                        </h4>
                        <br>

                        <div class="collapse" id="view_photos">
                            @forelse ($ad->getMedia('ad_images') as $image)
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
                                {{ is_null($ad->updated_at) ? $ad->created_at->diffForHumans() : $ad->updated_at->diffForHumans() }}
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

        $('#ad_nav').addClass('active')
    </script>
@endsection
