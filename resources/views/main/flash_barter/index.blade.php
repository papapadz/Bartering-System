@extends('layouts.main.app')

@section('title', 'Albarter | Flash Barter ⚡')


@section('content')
    {{-- CONTAINER --}}
    <div class="container mt-10 mb-3"> <br>
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="alert alert-warning mx-auto">
                    <h2 class="text-center text-dark"> Flash Barter 🔥
                    </h2>
                    <h2 class="text-center font-weight-normal text-dark">
                        Ends on </span> <i class="far fa-clock ms-1"></i>
                        <span id="hour"></span>
                        <span id="minute"></span>
                        <span id="second"></span>
                    </h2>
                    <p class="text-center text-dark">All Items in flash barter are all discounted. Hurry and try
                        to trade 🔥!!</p>
                </div>
                <br><br>
                <div class="row">
                    @forelse ($flash_barters as $post)
                        <div class="col-6 col-md-4 col-lg-3 d-flex align-self-stretch ">
                            <div class="card w-100 card-shadow-none hoverable">
                                <img class="card-img-top" src="{{ handleNullFeaturedPhoto($post->featured_photo) }}"
                                    width="120" alt="post">
                                <div class="card-body d-flex and flex-column">
                                    <a class="card-text text-center mb-2 text-dark"
                                        href="{{ route('main.posts.show', $post) }}">
                                        {{ $post->title }} ⚡
                                    </a>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between text-white">
                                        <div>
                                            <p class="text-dark">
                                                <img class="img-fluid rounded-circle"
                                                    src="{{ handleNullAvatar($post->user->avatar_thumbnail) }}"
                                                    alt="avatar" width="30">
                                                <span class="ml-1">
                                                    <a class="text-dark"
                                                        href="{{ route('main.barterers.show', $post->user) }}">
                                                        {{ $post->user->first_name }}
                                                    </a>
                                                </span>
                                            </p>
                                            <p class="text-dark" style="font-size: 15px">
                                                <img src="{{ asset('img/location.png') }}" width="30" alt="location">
                                                {{ $post->user->municipality->name }}
                                            </p>
                                        </div>

                                        <div class="text-dark d-none d-md-block">
                                            <span class="mr-1"> {{ $post->comments->count() }} <i
                                                    class="far fa-comment text-dark"></i></span>
                                            <span> {{ $post->likes->count() }} <i
                                                    class="far fa-thumbs-up text-dark"></i></span>
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
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}


@endsection

@section('script')
    <script>
        const today = new Date().getTime()

        setInterval(() => {
            countDown({
                hour: '#hour',
                minute: '#minute',
                second: '#second'
            })
        }, 1000);

        function countDown(element) {
            // Update the count down every 1 second
            const x = setInterval(function() {
                // Get today's date and time
                const now = new Date();

                // Time calculations for days, hours, minutes and seconds
                let remaining_hour = 24 - now.getHours(); // 24 hrs - time [spent by hr]
                let remaining_minute = 60 - now.getMinutes(); // 60 min - time [spent by min]
                let remaining_second = 60 - now.getSeconds(); // 60 sec - time [spent by sec]
                log(element.hour)
                document.querySelector(
                    `${element.hour}`
                ).innerText = `${remaining_hour} hr |`;
                document.querySelector(
                    `${element.minute}`
                ).innerText = `${remaining_minute} Min |`;
                document.querySelector(
                    `${element.second}`
                ).innerText = `${remaining_second} Sec `;

                // If the count down is finished, stop interval
                if (now < 0) {
                    clearInterval(x);
                    // display to the html page

                    document.querySelector(
                        `${element.hour}`
                    ).innerText = ``;
                    document.querySelector(
                        `${element.minute}`
                    ).innerText = ``;
                    document.querySelector(
                        `${element.second}`
                    ).innerText = ``;
                }
            }, 1000);
        }


        $('#main_flash_barter_nav').addClass('active');
    </script>
@endsection
