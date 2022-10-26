@extends('layouts.main.app')

@section('title', 'Albarter| Freelance barterers')

@section('content')
    {{-- CONTAINER --}}
    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <div>
                    <a class="float-left" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        Toggle to Advanced Search <i class="fas fa-list ml-1"></i>
                    </a>
                </div>
                <br><br>
                <div class="collapse mt-2" id="collapseExample">
                    <div class="card card-body">
                        <form action="{{ route('main.barterers.index') }}" method="get">
                            <div class="row mb-2 d-flex align-items-center">
                                <div class="col-md-10">
                                    <div class="form-group mb-1">
                                        <input class="form-control form-control-sm" type="search" name="name"
                                            placeholder="Enter Barterer Name (Ex. John Doe)" value="{{ request('name') }}">
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
                @include('layouts.includes.alert')

                <h2 class="mt-3"> <i class="fas fa-link mr-1"></i> Top Barterer ⚡</h2> <br>
                <div class="row">
                    @forelse ($top_barterers as $top_barterer)
                        <div class="col-12 col-md-6 col-lg-4 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2"
                                        href="{{ route('main.barterers.show', $top_barterer) }}">
                                        <img src="{{ handleNullAvatar($top_barterer->avatar_thumbnail) }}" alt="avatar.svg"
                                            width="100">
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <a class="text-dark" href="{{ route('main.barterers.show', $top_barterer) }}">
                                                {{ $top_barterer->first_name }}
                                            </a>
                                        </div>
                                        <div>
                                            @if ($top_barterer->avg_ratings)
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i > $top_barterer->avg_ratings)
                                                        <i class="far fa-star text-warning"></i>
                                                    @else
                                                        <i class="fas fa-star text-warning"></i>
                                                    @endif
                                                @endfor
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                                <i class="far fa-star text-warning"></i>
                                                <i class="far fa-star text-warning"></i>
                                                <i class="far fa-star text-warning"></i>
                                                <i class="far fa-star text-warning"></i>
                                            @endif
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

                <h2 class="mt-3"> <i class="fas fa-link mr-1"></i> Others </h2> <br>
                <div class="row">
                    @forelse ($barterers as $barterer)
                        <div class="col-12 col-md-6 col-lg-2 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2"
                                        href="{{ route('main.barterers.show', $barterer) }}">
                                        <img src="{{ handleNullAvatar($barterer->avatar_thumbnail) }}" alt="avatar.svg"
                                            width="100">
                                    </a>
                                </div>
                                <div class="card-footer border-0 text-center">
                                    <a class="text-dark" href="{{ route('main.barterers.show', $barterer) }}">
                                        {{ $barterer->first_name }}
                                    </a>
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
            {{ $barterers->links() }}
        </div>
    </div>
    {{-- End CONTAINER --}}


@endsection

@section('script')
    <script>
        $('#barterer_nav').addClass('active');
    </script>
@endsection
