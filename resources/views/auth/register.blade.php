@extends('layouts.main.app')

@section('title', 'Albarter | Register')

@section('content')
    <div class="container">
        <div class="row gx-lg-5 align-items-center d-flex align-items-center vh-100">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="display-3 font-weight-bold ls-tight">
                    <span class="text-primary">{{ config('app.name') }}</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Save Money. Help the Environment. Meet Cool People |
                    Barter what you have. Get what you need. Give what you can. |
                    We help individuals to save money, increase profits, and decrease
                    the cost of doing business through our barter exchange.
                </p>
                <img class="img-fluid" src="{{ asset('img/auth/register.svg') }}" alt="">
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true"><i class="fas fa-user mr-2"></i>Create Account</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false"><i class="fas fa-user-shield mr-2"></i>Become a Subscriber</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    {{-- Basic --}}
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                        aria-labelledby="tabs-icons-text-1-tab">
                        <div class="card card-body">
                            <form action="{{ route('auth.attempt_register') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @include('layouts.includes.alert')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" name="first_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Middle Name</label>
                                            <input class="form-control" type="text" name="middle_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" name="last_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value=""></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Birth Date</label>
                                            <input class="form-control" type="date" max="2012-01-01" name="birth_date">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Address</label>
                                            <input class="form-control" type="text"name="address"
                                                placeholder="Complete Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Municipality</label>
                                            <select class="form-control" name="municipality_id">
                                                <option value=""></option>
                                                @foreach ($municipalities as $id => $municipality)
                                                    <option value="{{ $id }}">{{ $municipality }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Contact</label>
                                            <input class="form-control" type="number" min="0" name="contact"
                                                placeholder="Ex. 09659312005">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="you@email.com">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Re-Type Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- Checkbox -->
                                <div class="form-check  mb-4 text-center">
                                    <input class="form-check-input mr-2" type="checkbox" name="terms_of_service"
                                        id="terms_of_service" checked>
                                    <label class="form-check-label text-sm tos" for="terms_of_service"
                                        onclick="$('#m_terms').modal('show');">
                                        I have read the Terms of Service <i class="fas fa-info-circle ml-1"
                                            title="Read terms of service"></i>
                                    </label>
                                </div>

                                <input type="hidden" name="subscription_type" value="basic">

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>
                                <div class="text-center">
                                    <a class="text-sm" href="{{ route('auth.login') }}">Already have an account?</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Pro --}}
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                        aria-labelledby="tabs-icons-text-2-tab">
                        <div class="card card-body">
                            <a href="javascript:void(0)" onclick="$('#m_payment_method').modal('show')">
                                Accepting Payments <i class="fas fa-info-circle ml-1"></i>
                            </a>
                            <br>

                            <form action="{{ route('auth.attempt_register') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @include('layouts.includes.alert')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control form-control-sm" type="text" name="first_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Middle Name</label>
                                            <input class="form-control form-control-sm" type="text"
                                                name="middle_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control form-control-sm" type="text" name="last_name">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control form-control-sm" name="gender">
                                                <option value=""></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Birth Date</label>
                                            <input class="form-control form-control-sm" type="date" max="2012-01-01"
                                                name="birth_date">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Address</label>
                                            <input class="form-control form-control-sm" type="text"name="address"
                                                placeholder="Complete Address">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Municipality</label>
                                            <select class="form-control form-control-sm" name="municipality_id">
                                                <option value=""></option>
                                                @foreach ($municipalities as $id => $municipality)
                                                    <option value="{{ $id }}">{{ $municipality }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Contact</label>
                                            <input class="form-control form-control-sm" type="number" min="0"
                                                name="contact" placeholder="Ex. 09659312005">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-sm" type="email" name="email"
                                                placeholder="you@email.com">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-sm" name="password">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Re-Type Password</label>
                                            <input type="password" class="form-control form-control-sm"
                                                name="password_confirmation">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Reference/Control No.</label>
                                            <input type="number" min="0" class="form-control form-control-sm"
                                                name="reference_no">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Select Payment Method *</label>
                                            <select class="form-control form-control-sm" name="payment_method_id">
                                                <option value=""></option>
                                                @foreach ($payment_methods as $payment_method)
                                                    <option value="{{ $payment_method->id }}">{{ $payment_method->type }}
                                                        -
                                                        {{ $payment_method->is_activated == true ? 'Online' : 'Offline' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Amount Paid</label>
                                            <input type="number" min="0" class="form-control" name="amount"
                                                value="99" readonly>
                                        </div>
                                        <div class="mb-2">
                                            <input type="file" class="payment_receipt" name="image">
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <!-- Checkbox -->
                                <div class="form-check  mb-4 text-center">
                                    <input class="form-check-input mr-2" type="checkbox" name="terms_of_service"
                                        id="form2Example33" checked>
                                    <label class="form-check-label text-sm tos" onclick="$('#m_terms').modal('show');">
                                        I have read the Terms of Service <i class="fas fa-info-circle ml-1"
                                            title="Read terms of service"></i>
                                    </label>
                                </div>
                                <input type="hidden" name="subscription_type" value="pro">

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>
                                <div class="text-center">
                                    <a class="text-sm" href="{{ route('auth.login') }}">Already have an account?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        initiateFilePond('.payment_receipt', ["image/png", "image/jpeg", "image/jpg", "image/webp"],
            ` Browse <span class="filepond--label-action"> Payment Receipt * </span>`)
        $('#main_register_nav').addClass('active')
    </script>
@endsection
