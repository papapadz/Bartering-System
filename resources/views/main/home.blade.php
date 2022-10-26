@extends('layouts.main.app')

@section('content')
    {{-- Section 1 --}}
    <section class="mt-5 bg-dark">
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#template-mo-zay-hero-carousel" data-slide-to="0" class="active" aria-current="true"></li>
                <li data-target="#template-mo-zay-hero-carousel" data-slide-to="1">
                </li>
                <li data-target="#template-mo-zay-hero-carousel" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner p-5">
                <div class="carousel-item active carousel-item-start" id="carousel-item-1">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-first d-none d-md-block">
                                <img class="img-fluid" src="{{ asset('img/main/section-1/1.svg') }}" alt="intro">
                            </div>

                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="display-3 text-capitalize text-white">
                                        Let's Start Bartering Today!</h1>
                                    <p class='text-white'> Save Money. Help the Environment. Meet Cool People </p>
                                    <a class="btn btn-primary" href="barter/posts">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-item-next carousel-item-start" id="carousel-item-2">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last d-none d-md-block">
                                <img class="img-fluid" src="{{ asset('img/main/section-1/2.svg') }}" alt="trading">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="display-3 text-capitalize text-white">Get What You Need Today!
                                    </h1>
                                    <p class='text-white'>Barter what you have. Get what you need. Give what you can.</p>
                                    <a class="btn btn-primary" href="barter/posts">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" id="carousel-item-3">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-first d-none d-md-block">
                                <img class="img-fluid" src="{{ asset('img/main/section-1/3.svg') }}" alt="saving">
                            </div>

                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="display-3 text-capitalize text-white">Save Your Money!
                                    </h1>
                                    <p class='text-white'>We help individuals to save money, increase profits, and decrease
                                        the cost of doing business through our barter exchange.</p>
                                    <a class="btn btn-primary" href="barter/posts">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
                role="button" data-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
                role="button" data-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </section>
    {{-- End Section 1 --}}

    {{-- Section 2 --}}
    <section class="py-2 py-md-5">
        <div class="container text-center">
            <h1 class="mb-4 text-primary font-weight-bold">How to start ?</h1>
            <p class="card-text">Let us help you with our 3 simple steps procedure.</p>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm border-white">
                        <div class="card-body">
                            <p class="text-center text-primary card-title"> Step 1 </p>
                            <p class="text-center text-primary card-text">Login / Sign up</p>
                            <p class="card-text">We encourage you to create an account if you haven't yet registered. Let's
                                barter together.</p>
                        </div>
                        <img class=" card-img-bottom" src="{{ asset('img/main/section-2/1.svg') }}" alt="authentication">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm border-white">
                        <div class="card-body">
                            <p class="text-center text-primary card-title"> Step 2 </p>
                            <p class="text-center text-primary card-text">Add item</p>
                            <p class="card-text">Simply add your item and wait for co-barterer to give you an awesome
                                offers. Use any of your items to create offers.</p>
                        </div>
                        <img class=" card-img-bottom" src="{{ asset('img/main/section-2/2.svg') }}" alt="add_item">
                    </div>
                    @guest
                        <a class="btn btn-lg btn-primary text-white d-none d-sm-block" href="/register">REGISTER NOW <i
                                class="fas fa-paper-plane ml-1"></i></a>
                    @endguest
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-white">
                        <div class="card-body">
                            <p class="text-center text-primary card-title"> Step 3 </p>
                            <p class="text-center text-primary card-text">Make a Deal</p>
                            <p class="card-text">Contact your co-barterer to make arrangements to exchange your items.
                                <span><q>Very easy </q></span>
                            </p>
                        </div>
                        <img class=" card-img-bottom" src="{{ asset('img/main/section-2/3.svg') }}" alt="trade">
                    </div>
                </div>
            </div>
        </div>
        <center>
            <hr class="w-75">
        </center>
    </section>
    {{-- End Section 2 --}}


    {{-- Start Section 3 --}}
    <section data-aos="zoom-in-up" data-aos-duration="1000">
        <div class="jumbotron jumbotron-fluid text-center mb-0">
            <h1 class="mb-4 text-primary font-weight-bold">Our Pricing</h1>
            <p class="card-text">Easy to try, Fair pricing to upgrade. Choose the right plan for you .</p>
            <br><br><br>
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 shadow-sm border-light">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">₱0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Limited Account <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Minimum 3 posts per day <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Unlimited Wishlist <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Boost Post <i class="fas fa-times ml-2 text-warning"></i></li>
                                <li>Flash Barter <i class="fas fa-times ml-2 text-warning"></i></li>
                                <li>Post Priority <i class="fas fa-times ml-2 text-warning"></i></li>
                            </ul>
                            @auth
                                <a class="btn btn-lg btn-block btn-outline-primary" href="javascript:void(0)"
                                    role="button">Sign up for free</a>
                            @endauth
                            @guest
                                <a class="btn btn-lg btn-block btn-outline-primary" href="/register" role="button">Sign up
                                    for free</a>
                            @endguest
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm border-light">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Pro Subscriber</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">₱99 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Pro Account <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Minimum 6 posts per day <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Unlimited Wishlist <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Boost Post <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Flash Barter <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Post Priority <i class="fas fa-check ml-2 text-primary"></i></li>
                            </ul>
                            @auth
                                <a class="btn btn-lg btn-block btn-primary" href="/register" role="button">Get
                                    started</a>
                            @endauth
                            @guest
                                <a class="btn btn-lg btn-block btn-primary" href="/register" role="button">Get started</a>
                            @endguest
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm border-light">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Premium Subscriber</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">₱150 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Premium Account <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Minimum 10 posts per day <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Unlimited Wishlist <i class="fas fa-check ml-2 text-primary"></i> </li>
                                <li>Boost Post <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Flash Barter <i class="fas fa-check ml-2 text-primary"></i></li>
                                <li>Super Priority <i class="fas fa-check ml-2 text-primary"></i></li>
                            </ul>
                            <a class="btn btn-lg btn-block btn-primary" href="javascript:void(0)" role="button">Coming
                                Soon</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- End Section 3 --}}


    {{-- Section 4 --}}
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-5 aside-stretch py-5 choose d-none d-md-block">
                    <img class="img-fluid" src="{{ asset('img/main/section-3/contact.svg') }}" alt="contact">
                </div>
                <div class="col-md-6 py-0 py-md-5 pl-md-5">
                    <h1 class="mb-2 font-weight-normal text-primary">Get in Touch</h1>
                    <p>
                        Need help? Our team got you covered on your concerns or questions in mind.
                    </p>
                    <br>
                    <form action="#" class="ftco-animate fadeInUp ftco-animated">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <grammarly-extension data-grammarly-shadow-root="true"
                                    style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT">
                                </grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true"
                                    style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;"
                                    class="cGcvT"></grammarly-extension>
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"
                                        spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary py-3 px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 4 --}}

    {{-- Section 5 --}}
    <section>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248682.03887346725!2d123.77317425000001!3d13.12091125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a101687e9bf8a7%3A0x305252e78d14537a!2sLegazpi%20City%2C%20Albay!5e0!3m2!1sen!2sph!4v1662787660265!5m2!1sen!2sph"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    {{-- Section 5 --}}
@endsection
