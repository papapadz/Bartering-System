@extends('layouts.user.app')

@section('title', 'Albarter | Manage Advertisement')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h2 class="font-weight-normal">
                            <a class="text-primary float-left mr-3" href="{{ route('user.ads.index') }}">
                                <i class='fas fa-arrow-left'></i>
                            </a>
                            Create Advertisement <i class="fas fa-bolt ml-1 text-warning"></i>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.ads.store') }}" method="post" enctype="multipart/form-data"
                            id="ads_form">
                            @csrf
                            @include('layouts.includes.alert')
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" name="title" placeholder="Add Title">
                                    </div>

                                    <div class="form-group mb-2">
                                        <textarea class="form-control" name="content" id="content_txtarea" rows="10"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="url" class="form-control" name="link"
                                            placeholder="Enter Link Ex. https://link.com.ph/00512">
                                    </div>


                                    <div class="mb-2">
                                        <input type="file" class="content_images" name="ads[]" multiple
                                            data-allow-reorder="true" data-max-file-size="1MB" data-max-files="10">
                                    </div>



                                </div>
                                <div class="col-md-5">
                                    <fieldset>
                                        <legend>Add Payment (REQUIRED)</legend>
                                        <a href="javascript:void(0)" onclick="$('#m_payment_method').modal('show')">
                                            Accepting Payments <i class="fas fa-info-circle ml-1"></i>
                                        </a>
                                        <br><br>
                                        <div class="form-group mb-2">
                                            <label class="form-label">Select No. Of Days *</label>
                                            <select class="form-control" name="day_count" onchange="getAmountToPay(this)">
                                                <option value=""></option>
                                                <option value="1">1 Day</option>
                                                <option value="3">3 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="7">1 Week</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label">Amount to Pay (₱) *</label>
                                            <input class="form-control" type="number" name="amount" min="0"
                                                readonly id="amount_to_pay">
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

                                        <button type="button" class="btn btn-sm btn-warning form-control"
                                            onclick="promptStore(event,'#ads_form')">
                                            Submit
                                        </button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>

                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/yiv2clsvcw9c4q7y2h8t92t4cuaia1l3383axmfdgovo3kft/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        function getAmountToPay(day) {
            if (day.value) {
                const amount_to_pay = day.value * 50
                $('#amount_to_pay').val(amount_to_pay)

            } else {
                $('#amount_to_pay').val('')
            }
        }

        initiateFilePond('.payment_receipt', [
            "image/png", "image/jpeg", "image/jpg", "image/webp"
        ], `Drag & Drop your files or <span class="filepond--label-action"> Browse Payment Receipt</span>`)

        initiateFilePond('.content_images')
        initiateEditor('textarea',
            'Add description about your advertisement. Note* We do not encourage any drug or sexual related advertisement. For more info you can visit our FAQS page.'
        )


        $('#add_ons_nav').addClass('active')
        $('#ads').addClass('text-warning')
    </script>
@endsection
