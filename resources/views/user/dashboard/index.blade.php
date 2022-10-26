@extends('layouts.user.app')

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row py-3">
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Posts</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_post }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-comment-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Boosted Posts</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_boosted_post }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Flash Barter</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_flash_barter }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Advertisement</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_ad }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column">
                        <canvas id="total_posts_by_category">{{-- Display total posts by category --}}</canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Recent Posts</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('user.posts.index') }}" class="btn btn-sm btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Featured Photo</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recent_posts as $post)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img class="img-fluid"
                                                    src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                                    width="75" alt="{{ $post->title }}">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Record Not Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <br>
                            </table>
                        </div>
                        <br>
                        {{ $recent_posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Recent Advertisement</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('user.ads.index') }}" class="btn btn-sm btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Featured Photo</th>
                                        <th scope="col">Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recent_ads as $ad)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img class="img-fluid"
                                                    src="{{ handleNullFeaturedPhoto($ad->featured_photo) }}" width="75"
                                                    alt="{{ $ad->title }}">
                                            </td>
                                            <td>{{ $ad->title }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Record Not Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <br>
                            </table>
                        </div>
                        <br>
                        {{ $recent_ads->links() }}
                    </div>
                </div>
            </div>

            <div class="col-xl-3 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Activity Logs</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('user.activity_logs.index') }}" class="btn btn-sm btn-dark">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex and flex-column">
                        @forelse ($activities as $al)
                            @php
                                $exploaded = explode('-', $al->description);
                            @endphp
                            <div class='border-left border-primary'>
                                <p class="m-0 pl-2 text-small">{{ $exploaded[0] }} - <span class='txt-lightblue'>
                                        {{ $exploaded[1] }} </span> </p>
                                <p class='pl-2 text-small'> {{ $al->created_at->diffForHumans() }} </p>
                            </div>
                            <br>
                        @empty
                            <img class="img-fluid" src="{{ asset('img/nodata.svg') }}" alt="nodata">
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.includes.footer')
    </div>
    <!-- End Page Content -->
@endsection

@section('script')
    <script>
        const bgc = ['#FFC94B', '#222426', '#F17A7E', '#95a5a6', '#2c3e50', '#ecf0f1', '#2980b9'];

        const categories = @json($total_posts_by_category[0]);
        const total_posts = @json($total_posts_by_category[1]);

        const total_posts_by_category = document.getElementById('total_posts_by_category');
        const chart_total_posts_by_category = new Chart(total_posts_by_category, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: categories,
                datasets: [{
                    label: 'Total Posts',
                    data: total_posts,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Posts'
                }
            }
        });

        $('#dashboard_nav').addClass('active')
    </script>
@endsection
