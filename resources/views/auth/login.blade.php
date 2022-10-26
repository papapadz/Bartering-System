@extends('layouts.main.app')

@section('title', 'Albarter | Login')

@section('content')
    <!-- Page content -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block my-auto">
                                <img src="{{ asset('img/auth/login.svg') }}" alt="login" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img class="img-fluid rounded-circle"
                                                src="{{ asset('img/logo/logo-plain.png') }}" width="75" alt="logo">
                                            <span class="h2 fw-bold mb-0 text-primary">{{ config('app.name') }}</span>

                                            <div class='dropdown ml-auto' title="go to page">
                                                <a class='text-primary' href='#' role='button' data-toggle='dropdown'
                                                    aria-haspopup='true' aria-expanded='false'>
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                                <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                                    <a class='dropdown-item' href="/">Home</a>
                                                    <a class='dropdown-item' href="#!">About Us</a>
                                                    <a class='dropdown-item' href="#!">Contact Us</a>
                                                    <a class='dropdown-item' href="#!">FAQS</a>
                                                </div>
                                            </div>

                                        </div>

                                        <h5 class="font-weight-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in to
                                            your account
                                        </h5>
                                        @include('layouts.includes.alert')

                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control form-control-lg" type="email" name="email"
                                                    autocomplete="email" required placeholder="Email"
                                                    value="admin@gmail.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend" id="password">
                                                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                </div>
                                                <input class="form-control form-control-lg" type="password" name="password"
                                                    autocomplete="new-password" id="password_field" placeholder="•••••••••"
                                                    value="test1234" required>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <a class="text-sm text-primary" href="{{ route('password.request') }}">Forgot
                                                Password?</a>
                                        </div>

                                        <div class="mt-3 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        {{-- <h5 class="text-center font-weight-normal text-muted">or login with</h5>
                                        <div class="row g-2 mb-3">
                                            <div class="col-sm-6"><a class="btn btn-outline-primary btn-sm d-block w-100"
                                                    href="#"><span class="fab fa-facebook mr-2"
                                                        data-fa-transform="grow-8"></span>
                                                    Facebook</a>
                                            </div>

                                            <div class="col-sm-6"><a class="btn btn-outline-danger btn-sm d-block w-100"
                                                    href="{{ route('auth.login_with_app', 'google') }}"><span
                                                        class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span>
                                                    Google</a>
                                            </div>
                                        </div> --}}
                                        <div class="text-sm text-muted text-center">
                                            Not yet registered?
                                            <a href="{{ route('auth.register') }}"
                                                style="text-decoration: underline; color: #5e72e4">Register</a>
                                        </div><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page content -->
@endsection
@section('script')
    <script>
        const password_field = document.getElementById('password_field');
        document.getElementById('password').addEventListener('click', function() {
            return password_field.getAttribute('type') == "password" ?
                password_field.setAttribute('type', 'text') :
                password_field.setAttribute('type', 'password')
        })

        $('#main_login_nav').addClass('active')
    </script>
@endsection
