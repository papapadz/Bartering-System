@extends('layouts.main.app')

@section('title', 'Albarter | Announcements')

@section('content')

    {{-- CONTAINER --}}
    <div class="container mt-10"> <br>
        <h2 class="font-weight-normal">
            Albarter | Announcements <i class="far fa-bell ml-1"></i>
        </h2>
        @include('layouts.includes.alert')
        <div class="row justify-content-center py-3">
            @forelse ($announcements as $announcement)
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="d-none d-md-block col-md-2">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($announcement->featured_photo) }}"
                                    alt="featured photo">
                            </div>
                            <div class="col-md-10 my-auto">
                                <div class="card-body">
                                    <div class='dropdown float-right'>
                                        <a class='btn btn-sm btn-icon-only text-light' href='#' role='button'
                                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <i class='fas fa-ellipsis-v'></i>
                                        </a>
                                        <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                            <a class='dropdown-item'
                                                href="{{ route('main.announcements.show', $announcement) }}">View</a>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold">{{ $announcement->title }}</h3>
                                    <p class="me-1">
                                        Albarter |
                                        {{ formatDate($announcement->created_at) }} <i class="far fa-calendar ml-1"></i>
                                    </p>
                                    <p class="card-text"><small class="text-muted">Last updated
                                            {{ is_null($announcement->updated_at) ? $announcement->created_at->diffForHumans() : $announcement->updated_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" alt="nodata">
                    <p class="text-center">Announcements Not Available</p>
                </div>
            @endforelse

        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        $('#announcement_nav').addClass('active')
    </script>
@endsection
