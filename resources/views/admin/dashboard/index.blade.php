@extends('layouts.admin.app')

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                {{-- Row 1 --}}
                <div class="row mt-4 mb-2">
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
                {{-- Row 2 --}}
                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-self-stretch">
                        <div class="card card-stats w-100">
                            <!-- Card body -->
                            <div class="card-body d-flex and flex-column">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Active User</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_active_user }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="fas fa-user"></i>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total In-Active User</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_inactive_user }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-user"></i>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Announcement</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_announcement }}</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Transaction</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $total_transaction }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-credit-card"></i>
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
        {{-- Chart --}}
        <div class="row">
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column">
                        <canvas id="total_posts_by_category">{{-- Display total posts by category --}}</canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column">
                        <!-- Chart Monthly User-->
                        <canvas id="chart_monthly_users"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex and flex-column">
                        <canvas id="chart_monthly_sales">{{-- Display monthly sales --}}</canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Recent Transactions</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.payments.index') }}" class="btn btn-sm btn-dark">View</a>
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
                                        <th scope="col">Transaction No.</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Paymentable</th>
                                        <th scope="col">Paymentable Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recent_transactions as $payment)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $payment->transaction_no }}</td>
                                            <td>{{ $payment->user_name }}</td>
                                            <td>{{ $payment->paymentable_name }}</td>
                                            <td>{!! handlePaymentableType($payment->paymentable_type) !!}</td>
                                            <td>{!! handlePaymentStatus($payment->status) !!}</td>
                                            <td>{{ formatDate($payment->created_at) }}</td>
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
        {{-- End Chart --}}

        {{-- Tables --}}
        <div class="row">
            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Recent Posts</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-dark">View</a>
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
                                        <th scope="col">By</th>
                                        <th scope="col">Featured Photo</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recent_posts as $post)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $post->user->full_name }}</td>
                                            <td><img class="img-fluid"
                                                    src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                                    width="50" alt="{{ $post->title }}">
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

            <div class="col-xl-6 d-flex align-self-stretch">
                <div class="card w-100">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-dark">Recent User</h3>
                            </div>
                            <div class="col text-right">
                                <a href="barterers" class="btn btn-sm btn-dark">View</a>
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
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Subscription</th>
                                        <th scope="col">Verified</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Registered At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recent_users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img class="img-fluid rounded-circle"
                                                    src="{{ handleNullAvatar($user->avatar_profile) }}" width="50"
                                                    alt="{{ $user->first_name }}">
                                            </td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->current_subscription->subscription_type->type }}</td>
                                            <td>{!! isVerified($user->email_verified_at) !!}</td>
                                            <td>{!! isActivated($user->is_activated) !!}</td>
                                            <td>{{ formatDate($user->created_at) }}</td>
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
                                <a href="{{ route('admin.ads.index') }}" class="btn btn-sm btn-dark">View</a>
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
                                                    src="{{ handleNullFeaturedPhoto($ad->featured_photo) }}"
                                                    width="75" alt="{{ $ad->title }}">
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
                                <a href="{{ route('admin.activity_logs.index') }}" class="btn btn-sm btn-dark">View</a>
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
        {{-- End Tables --}}
        @include('layouts.includes.footer')
    </div>


    <!-- End Page Content -->
@endsection

@section('script')
    <script>
        const bgc = ['#2F89FC', '#222426', '#FFC94B', '#5603ad', '#2c3e50', '#ecf0f1', '#2980b9'];

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


        const chart_monthly_users_months = @json($chart_monthly_users[0]);
        const chart_monthly_users_total_users = @json($chart_monthly_users[1]);

        const chart_monthly_users = document.getElementById('chart_monthly_users');
        const a = new Chart(chart_monthly_users, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: chart_monthly_users_months,
                datasets: [{
                    label: 'Monthly User',
                    data: chart_monthly_users_total_users,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Monthly User'
                }
            }
        });

        const chart_monthly_sales_months = @json($chart_monthly_sales[0]);
        const chart_monthly_sales_total_sales = @json($chart_monthly_sales[1]);

        const char_monthly_sales = document.getElementById('chart_monthly_sales');
        const b = new Chart(char_monthly_sales, {
            type: 'bar', // bar , horizontal, line ,doughnut ,radar , polarArea
            data: {
                labels: chart_monthly_sales_months,
                datasets: [{
                    label: 'Monthly Sales',
                    data: chart_monthly_sales_total_sales,
                    backgroundColor: bgc
                }],

            },
            options: {
                title: {
                    display: true,
                    text: 'Total Monthly Sales'
                }
            }
        });

        $('#dashboard_nav').addClass('active')
    </script>
@endsection
