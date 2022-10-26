@extends('layouts.admin.app')

@section('title', 'Admin | Payment Info')

@section('content')

    {{-- CONTAINER --}}
    <div class="container py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0 bg-warning">
                        <h2 class="text-white text-center font-weight-normal">
                            <a class="text-white float-left" href="{{ route('admin.payments.index') }}"><i
                                    class="fas fa-arrow-left"></i>
                            </a>
                            <span class="ml-3">
                                Payment Info
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
                                            src="{{ handleNullAvatar($payment->user?->avatar_profile) }}" width="75"
                                            alt="avatar"> <br><br>
                                        <h4>User :
                                            <span
                                                class="font-weight-normal">{{ $payment->user->full_name ?? $payment->user_name }}</span>
                                        </h4>

                                        <h4>Transaction No :
                                            <span class="font-weight-normal">{{ $payment->transaction_no }}</span>
                                        </h4>
                                        <h4>Date : <span class="font-weight-normal">{{ formatDate($payment->created_at) }}
                                                <i class="far fa-calendar ms-1"></i></span>
                                        </h4>
                                        <h4>
                                            Paymentable: <span
                                                class="font-weight-normal">{{ $payment->paymentable_name }}</span>
                                        </h4>
                                        <h4>
                                            Paymentable Type: <span
                                                class="font-weight-normal">{!! handlePaymentableType($payment->paymentable_type) !!}</span>
                                        </h4>
                                        {{-- Status --}}
                                        <h4 class=" font-weight-normal">Status - {!! handlePaymentStatus($payment->status) !!}</h4>
                                        @if ($payment->remark)
                                            <h4>
                                                Remark: {{ $payment->remark }}
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
                                                <a class="glightbox" href="{{ $payment->payment_receipt }}">
                                                    <img class="img-fluid"
                                                        src="{{ handleNullImage($payment->payment_receipt) }}"
                                                        width="100" alt="payment_receipt">
                                                </a>
                                                <figcaption>
                                                    <h4 class="font-weight-normal mt-2">Control No : <span
                                                            class=" fw-bold">{{ $payment->reference_no }}</span>
                                                    </h4>
                                                    <h4 class="font-weight-normal mt-2">Paid Via : <span
                                                            class="badge badge-primary p-2">{{ $payment->payment_method->type }}</span>
                                                    </h4>
                                                </figcaption>
                                            </figure>
                                            <div class="d-block d-md-none">
                                                <h4>Control No : <span class=" fw-bold">{{ $payment->reference_no }}</span>
                                                </h4>
                                                <p class="mt-2 fw-bold">Paid Via : <span
                                                        class="badge badge-primary p-2">{{ $payment->payment_method->type }}</span>
                                                </p>
                                                <a class="font-weight-normal"
                                                    href="{{ handleNullImage($payment->payment_receipt) }}"
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
        $('#payment_nav').addClass('active')
    </script>
@endsection
