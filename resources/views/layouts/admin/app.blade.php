<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Admin | Dashboard')</title>
    @include('layouts.admin.styles')
</head>

<body class="g-sidenav-pinned">
    @include('layouts.admin.modal')
    {{-- Side Nav --}}
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <img class="navbar-brand mt-3" src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}" width="115"
                    alt="avatar" title="{{ auth()->user()->name }}">
                <div class="d-block d-lg-none">
                    <div class="sidenav-toggler" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <h5 class="font-weight-normal p-0 text-muted mt-2 mt-md-0 mb-1">
                        Administrator
                    </h5>
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.dashboard.index') }}" id="dashboard_nav">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#to_post_management" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables" id="post_management_nav">
                                <i class="fas fa-comment-alt"></i>
                                <span class="nav-link-text">
                                    Post Management
                                </span>
                            </a>
                            <div class="collapse" id="to_post_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.index') }}" class="nav-link" id="category">
                                            Category
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.posts.index') }}" class="nav-link" id="post">
                                            Post
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#to_payment_management" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables" id="payment_management_nav">
                                <i class="fas fa-credit-card"></i>
                                <span class="nav-link-text">
                                    Payment Management
                                </span>
                            </a>
                            <div class="collapse" id="to_payment_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.payment_methods.index') }}" class="nav-link"
                                            id="payment_method">
                                            Payment Method
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.payments.index') }}" class="nav-link"
                                            id="payment_transaction">
                                            Transaction
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="#to_services_nav" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables" id="add_ons_nav">
                                <i class="fas fa-bolt"></i>
                                <span class="nav-link-text">
                                    Add-Ons
                                </span>
                            </a>
                            <div class="collapse" id="to_services_nav">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.subscriptions.index') }}" class="nav-link"
                                            id="subscription">
                                            Subscription <i class="fas fa-bolt ml-1 text-warning"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.flash_barters.index') }}" class="nav-link"
                                            id="flash_barter">
                                            Flash Barter <i class="fas fa-bolt ml-1 text-warning"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.boosted_posts.index') }}" class="nav-link"
                                            id="boosted_post">
                                            Boosted Post <i class="fas fa-bolt ml-1 text-warning"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.ads.index') }}" class="nav-link" id="ads">
                                            Ads <i class="fas fa-bolt ml-1 text-warning"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#to_auth_management" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables" id="auth_management_nav">
                                <i class="fas fa-user-cog"></i>
                                <span class="nav-link-text">
                                    Auth Management
                                </span>
                            </a>
                            <div class="collapse" id="to_auth_management">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.admins.index') }}" class="nav-link" id="admin">
                                            Manage Administrator
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.barterers.index') }}" class="nav-link"
                                            id="barterer">
                                            Manage Barterer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>

                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Others</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-md-none">
                            <a class="nav-link" href="{{ route('main.home') }}" id="home_nav">
                                <i class="fas fa-home"></i>
                                <span class="nav-link-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.announcements.index') }}"
                                id="announcement_nav">
                                <i class="fas fa-bell"></i>
                                <span class="nav-link-text">Announcement</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.activity_logs.index') }}"
                                id="activity_logs_nav">
                                <i class="fas fa-history"></i>
                                <span class="nav-link-text">Activity Logs</span>
                            </a>
                        </li>
                    </ul>


                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Settings</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.index') }}" id="profile_nav">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> {{-- End Side Nav --}}

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-dark border-bottom">
            <div class="container-fluid">
                <a class="btn btn-sm btn-primary d-none d-lg-block" href="{{ route('main.home') }}"><i
                        class="fas fa-chevron-left mr-1"></i>
                    Home
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have
                                        <strong>{{ $new_requests->count() }}</strong>
                                        {{ Str::plural('notification', $new_requests->count()) }}.
                                    </h6>
                                </div>
                                <!-- List group -->
                                @forelse ($new_requests as $request)
                                    <div class="list-group list-group-flush">
                                        <a href="{{ route('admin.payments.index') }}"
                                            class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <i class="fas fa-bolt text-warning fa-lg"></i>
                                                </div>
                                                <div class="col ml--2">
                                                    <p class="text-sm mb-0">{{ $request->description }}
                                                    </p>
                                                    <small>{{ $request->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                @empty
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <img class="img-fluid d-block mx-auto"
                                                    src="{{ asset('img/nodata.svg') }}" width="100"
                                                    alt="empty">
                                            </div>
                                        </a>

                                    </div>
                                @endforelse
                                <!-- View all -->
                                <a href="javascript:void(0)"
                                    class="dropdown-item text-center font-weight-bold py-3">View all</a>
                            </div>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img src="{{ handleNullAvatar(auth()->user()->avatar_profile) }}"
                                            class="avatar rounded-circle" alt="Image placeholder">
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Settings</h6>
                                </div>
                                <a href="{{ route('profile.index') }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profile</span>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item"
                                    onclick="confirm('Do you want to Logout?', '', 'Yes').then(res => res.isConfirmed ? $('#logout').submit() : false)">
                                    <i class="fas fa-power-off"></i>
                                    <span>Logout</span>
                                </a>
                                <form action="{{ route('auth.logout') }}" method="post" id="logout">@csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->

        @yield('content')

    </div>
    {{-- End Main Content --}}

    @include('layouts.admin.scripts')
    <script src="{{ asset('assets/js/admin/script.js') }}"></script>
    @yield('script')
    @routes

</body>

</html>
