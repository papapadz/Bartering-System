@extends('layouts.user.app')

@section('title', 'Albarter | Flash Barter Info')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0 bg-warning">
                        <h2 class="text-white text-center font-weight-normal">
                            <a class="text-white float-left" href="{{ route('user.flash_barters.index') }}"><i
                                    class="fas fa-arrow-left"></i>
                            </a>
                            <span class="ml-3">
                                Flash Barter Info
                                <i class="fas fa-info-circle ml-1"></i>
                            </span>
                        </h2>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <div class="col-md-6 font-weight-normal">
                                        <img class="img-fluid rounded-circle mx-1"
                                            src="{{ handleNullAvatar($flash_barter->payment->user?->avatar_profile) }}"
                                            width="75" alt="avatar"> <br><br>
                                        <h4>User :
                                            <span
                                                class="font-weight-normal">{{ $flash_barter->payment->user->full_name }}</span>
                                        </h4>
                                        <h4>
                                            Paymentable: <span class="font-weight-normal">
                                                {{ $flash_barter->post->title }}
                                            </span>
                                        </h4>
                                        <h4>Transaction No :
                                            <span
                                                class="font-weight-normal">{{ $flash_barter->payment->transaction_no }}</span>
                                        </h4>
                                        <h4>Subscribed At: <span
                                                class="font-weight-normal">{{ formatDate($flash_barter->date_start) }}
                                                <i class="far fa-calendar ms-1"></i></span>
                                        </h4>
                                        <h4>Subscription Due: <span
                                                class="font-weight-normal">{{ formatDate($flash_barter->date_end) }}
                                                <i class="far fa-calendar ms-1"></i></span>
                                        </h4>
                                        {{-- Status --}}
                                        <h4 class=" font-weight-normal">Payment Status - {!! handlePaymentStatus($flash_barter->payment->status) !!}</h4>

                                        @if ($flash_barter->payment->remark)
                                            <h4>
                                                Remark: {{ $flash_barter->payment->remark }}
                                            </h4>
                                        @endif
                                        <p>
                                            <a class="text-warning" data-toggle="collapse" href="#show_payment_receipt"
                                                role="button" aria-expanded="false" aria-controls="show_payment_receipt"
                                                style="text-decoration: underline">
                                                View Receipt
                                            </a>
                                        </p>

                                        <div class="collapse" id="show_payment_receipt">
                                            <figure class="d-md-block d-none">
                                                <a class="glightbox" href="{{ $flash_barter->payment->payment_receipt }}">
                                                    <img class="img-fluid"
                                                        src="{{ handleNullImage($flash_barter->payment->payment_receipt) }}"
                                                        width="100" alt="payment_receipt">
                                                </a>
                                                <figcaption>
                                                    <h4 class="font-weight-normal mt-2">Amount Paid : <span
                                                            class=" fw-bold">₱
                                                            {{ number_format($flash_barter->payment->amount) }}</span>
                                                    </h4>
                                                    <h4 class="font-weight-normal mt-2">Control No : <span
                                                            class=" fw-bold">{{ $flash_barter->payment->reference_no ?? 'N/A' }}</span>
                                                    </h4>
                                                    <h4 class="font-weight-normal mt-2">Paid Via : <span
                                                            class="badge badge-primary p-2">{{ $flash_barter->payment->payment_method?->type ?? 'Pro Subscription' }}</span>
                                                    </h4>
                                                </figcaption>
                                            </figure>
                                            <div class="d-block d-md-none">
                                                <h4>Control No : <span
                                                        class=" fw-bold">{{ $flash_barter->payment->reference_no }}</span>
                                                </h4>
                                                <p class="mt-2 fw-bold">Paid Via : <span
                                                        class="badge badge-primary p-2">{{ $flash_barter->payment->payment_method?->type ?? 'Pro Subscription' }}</span>
                                                </p>
                                                <a class="font-weight-normal"
                                                    href="{{ handleNullImage($flash_barter->payment->payment_receipt) }}"
                                                    download>Download
                                                    Payment Receipt <i class="fas fa-download"></i></a>
                                            </div>
                                            <hr class="d-block d-md-none">
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-none d-md-block">
                                        <img class="img-fluid" src="{{ asset('img/payment/invoice.svg') }}" alt="invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        $('#add_ons_nav').addClass('active')
        $('#flash_barter').addClass('text-warning')
    </script>
@endsection
