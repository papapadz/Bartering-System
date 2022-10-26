@extends('layouts.user.app')

@section('title', 'Albarter | Advertisement ⚡')


@section('content')
    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="font-weight-normal text-primary">
                    <a class="float-right btn btn-sm btn-warning me-3" href="{{ route('user.ads.create') }}">
                        Advertisement ⚡</a>
                </h2>
                <br>
                @include('layouts.includes.alert')
                @forelse ($ads as $ad)
                    <div class="col-md-12 mt-3 px-0">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="d-none d-md-block col-md-2">
                                    <img class="card-img-top" src="{{ handleNullFeaturedPhoto($ad->featured_photo) }}"
                                        alt="ad">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <div class='dropdown float-right'>
                                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button'
                                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fas fa-ellipsis-v'></i>
                                            </a>
                                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                                <a class='dropdown-item' href="{{ route('user.ads.show', $ad) }}">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                        <h2
                                            class="text-dark text-capitalize font-weight-normal @if ($ad->is_expired) text-through @endif">
                                            <a href="{{ route('main.ads.show', $ad) }}">
                                                {{ $ad->title }} ⚡
                                            </a>
                                        </h2>
                                        <h3 class="font-weight-normal text-capitalize">
                                            • Advertisement | {!! handleAddOnsStatus($ad->payment->status) !!}
                                        </h3>

                                        <h4 class="font-weight-normal"> <i class="far fa-clock mr-1"></i>
                                            {{ is_null($ad->updated_at) ? $ad->created_at->diffForHumans() : $ad->updated_at->diffForHumans() }}</small>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/nodata.svg') }}" width="600"
                            alt="no data">
                        <h3 class="text-center font-weight-normal">Oops! Records Not Found
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>
        <br>
    </div>
    {{-- End CONTAINER --}}


@endsection

@section('script')
    <script>
        $('#add_ons_nav').addClass('active');
        $('#ads').addClass('text-warning');
    </script>
@endsection
