@extends('layouts.user.app')

@section('title', 'Albarter | Flash Barter')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="text-primary" href="{{ route('user.flash_barters.index') }}">
                            <i class='fas fa-arrow-left fa-lg'></i>
                        </a>
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ asset('img/boost_post/default.svg') }}" alt="boostpost">
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-dark">Join Our Flash Barter Today! <i
                                        class="fas fa-bolt ml-1 text-warning"></i></h1>
                                <p>We offer your this kind of feature to showcase more of your item. Read more about our
                                    Flash Barter Add-Ons ⚡.</p>
                                <a href="javascript:void(0)" onclick="$('#m_payment_method').modal('show')">
                                    Accepting Payments <i class="fas fa-info-circle ml-1"></i>
                                </a>
                                <br><br>
                                @include('layouts.includes.alert')

                                <form action="{{ route('user.flash_barters.store') }}" method="post" id="post_form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label">Select Post *</label>
                                        <select class="form-control" name="post_id">
                                            <option value=""></option>
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if (auth()->user()->current_subscription->subscription_type_id == \App\Models\SubscriptionType::BASIC)

                                        <div class="form-group mb-2">
                                            <label class="form-label">Amount to Pay (₱) *</label>
                                            <input class="form-control" type="number" name="amount" min="0"
                                                readonly value="50">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Reference/Control No. *</label>
                                            <input class="form-control" type="number" min="0" name="reference_no">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Select Payment Method *</label>
                                            <select class="form-control" name="payment_method_id">
                                                <option value=""></option>
                                                @foreach ($payment_methods as $payment_method)
                                                    <option value="{{ $payment_method->id }}">{{ $payment_method->type }} -
                                                        {{ $payment_method->is_activated == true ? 'Online' : 'Offline' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-2">
                                            <input class="payment_receipt" type="file" name="image">
                                        </div>
                                    @endif

                                    <div>
                                        <button type="button" class="btn btn-warning form-control"
                                            onclick="promptStore(event,'#post_form')">Submit</button>
                                    </div>
                                </form>
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
        initiateFilePond('.payment_receipt', [
            "image/png", "image/jpeg", "image/jpg", "image/webp"
        ], `Drag & Drop your files or <span class="filepond--label-action"> Browse Payment Receipt</span>`)

        $('#add_ons_nav').addClass('active');
        $('#flash_barter').addClass('text-warning');
    </script>
@endsection
