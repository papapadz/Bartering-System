@auth
    {{-- Create / Edit Comment --}}
    <div class="modal fade" id="m_comment" tabindex="-1" role="dialog" aria-labelledby="m_comment" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title text-white"> Edit Comment <i class="fas fa-edit ml-1"></i></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="comment_form" autocomplete="off">
                        <div class="input-group input-group-outline">
                            <input class="form-control form-control-lg" type="text" name="comment" id="comment">
                            <input type="hidden" name="post_id" id="post_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary float-end btn_update_comment"
                        onclick="updateComment('.comment_form', 'user.comments.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Create / Edit Comment --}}
@endauth


{{-- only show payment methods on this specific routes --}}
@if (url()->current() === route('auth.register') ||
    url()->current() === route('user.boosted_posts.create') ||
    url()->current() === route('user.flash_barters.create') ||
    url()->current() === route('user.ads.create'))


    {{-- payment_method --}}
    <div class="modal fade" id="m_payment_method" tabindex="-1" role="dialog" aria-labelledby="m_payment_method_label"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title text-white"><i class="fas fa-info-circle me-1"></i> Accepting Payments: </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <div class="d-flex align-items-center">

                        <img class="img-fluid" src="{{ asset('img/payment/gcash-qr.png') }}" width="200"
                            id="show_img" alt="gcash-qr">
                        <div>
                            <h4 class="font-weight-normal text-muted">
                                Scan this QR code with your Gcash app. To pay,
                                upload a snapshot of your payment transaction from your selected payment method.
                            </h4>
                            <h4 class="font-weight-normal text-muted">
                                Any
                                Questions? Read our <a class="text-primary" href="javascript:void(0)">FAQS</a>
                            </h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Accepting</th>
                                    <th>Account Name</th>
                                    <th>Account No.</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_methods as $pm)
                                    <tr>
                                        <td>{{ $pm->type }}</td>
                                        <td>{{ $pm->account_name }}</td>
                                        <td>{{ $pm->account_no }}</td>
                                        <td>{!! isOnline($pm->is_activated) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End payment_method --}}
@endif

@if (Route::is('auth.register'))
    {{-- Terms And Condition --}}
    <div class="modal fade" id="m_terms" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-normal text-white">Terms and Conditions <i
                            class="fas fa-info-circle ml-1" role="button"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-fluid" src="{{ asset('img/auth/tos.svg') }}" width="900"
                                alt="terms of service">
                        </div>
                        <div class="col-md-8">
                            <div class="px-3">
                                <h5 class="font-weight-normal text_default"> Take time to Read <i
                                        class="far fa-comment-dots ml-1 "></i> </h5>
                                <ol class="text-muted">
                                    <li>
                                        Albarter is NOT RESPONSIBLE for any loss due to any bartering or exchange of any
                                        item in this platform
                                    </li>
                                    <li>
                                        In the instance that we are contacted about any member here being a "bad trader"
                                        or a "scammer," we reserve the right to turn any personal information and all IP
                                        we have on that member over to any law enforcement authorities and/or any other
                                        group or individuals we desire. If we think you are a troll or a scammer, we
                                        reserve the right to turn over any and all personal information we have on you.
                                        If you do not agree with this rule, do not trade on our platform.
                                    </li>
                                    <li>
                                        This platform is intended only for bartering not selling.
                                    </li>
                                    <li>
                                        No bartering of COUPONS or any other freely distributed items such as free beta
                                        keys, discount codes, or anything else obtained free from a public source. etc.
                                    </li>
                                    <li>
                                        No LINKING to other sites except
                                    </li>
                                    <li>
                                        Mode of payment are fully up to the owner and the co-barterer.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>


    {{-- VALID ID --}}

    <div class="modal fade" id="m_id" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header default_bg">
                    <h6 class="modal-title text-white font-weight-normal text-white text-uppercase">Your photo -
                        holding your ID beside your face <i class="fas fa-info-circle ml-1" role="button"></i></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-thumbnail" src="{{ asset('img/auth/user_w_id.jpg') }}" alt="user_with_id">
                </div>
            </div>
        </div>
    </div>
    {{-- End Valid ID --}}
@endif
