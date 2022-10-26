<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Dashboard')</title>
    @include('layouts.user.styles')
    @yield('styles')
</head>

<body class="g-sidenav-pinned">
    @include('layouts.user.modal')
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
                    <h5 class="font-weight-normal p-0 mt-2 mt-md-0" data-toggle="tooltip" data-placement="bottom"
                        data-html="true"
                        title="You are in <span class='text-warning font-weight-bold text-capitalize'>{{ auth()->user()->current_subscription->subscription_type->type }} Subscription</span>
                            <br> maximum daily post - {{ auth()->user()->current_subscription->subscription_type->post_count }}
                            <br> Boost Post {{ auth()->user()->current_subscription->subscription_type->boost_post ? '<span class="text-success">✓</span>' : '<span class="text-danger">✕</span>' }} <br> Flash Barter {{ auth()->user()->current_subscription->subscription_type->flash_barter ? '<span class="text-success">✓</span>' : '<span class="text-danger">✕</span>' }} ">
                        {{ auth()->user()->full_name }}
                    </h5>
                    <h4>
                        @if (auth()->user()->current_subscription->subscription_type_id == \App\Models\SubscriptionType::BASIC)
                            <span class="badge badge-primary">Free Account</span>
                        @else
                            <span class="badge badge-warning">Pro Account ⚡</span>
                        @endif
                    </h4>
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard.index') }}">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.posts.index') }}" id="post_management_nav">
                                <i class="fas fa-comment-alt"></i>
                                <span class="nav-link-text">Post Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.barters.index') }}" id="barter_nav">
                                <i class="far fa-handshake"></i>
                                <span class="nav-link-text">Barter</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#to_add_ons_nav" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-tables" id="add_ons_nav">
                                <i class="fas fa-bolt"></i>
                                <span class="nav-link-text">
                                    Add Ons
                                </span>
                            </a>
                            <div class="collapse" id="to_add_ons_nav">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('user.boosted_posts.index') }}" class="nav-link"
                                            id="boosted_post">
                                            Boosted Post
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.flash_barters.index') }}" class="nav-link"
                                            id="flash_barter">
                                            Flash Barter
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.ads.index') }}" class="nav-link" id="ads">
                                            Advertisement
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
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item d-block d-md-none">
                            <a class="nav-link" href="{{ route('main.home') }}" id="home_nav">
                                <i class="fas fa-home"></i>
                                <span class="nav-link-text">Home</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.messages.index') }}" id="message_nav">
                                <i class="fas fa-envelope"></i>
                                <span class="nav-link-text">Inbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.favorites.index') }}" id="favorites_nav">
                                <i class="fas fa-heart"></i>
                                <span class="nav-link-text">Favorites</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.activity_logs.index') }}" id="activity_logs_nav">
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

    @include('layouts.user.scripts')
    <script src="{{ asset('assets/js/user/script.js') }}"></script>
    @yield('script')
    @routes

</body>

</html>
