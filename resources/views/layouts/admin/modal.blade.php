@if (url()->current() === route('admin.categories.index'))
    {{-- Creating category --}}
    <div class="modal fade" id="m_category" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_category_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_category_header">
                    <h6 class="modal-title text-white" id="m_category_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="category_form" autocomplete="off">
                        <label class="fw-bold">Enter Category *</label>
                        <div class="input-group input-group-outline mb-3 ">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_category btn-dark"
                        onclick="c_store('.category_form','.category_dt', 'admin.categories.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_category btn-primary"
                        onclick="c_update('.category_form','.category_dt', 'admin.categories.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating category --}}
@endif

{{-- Creating payment_method --}}
@if (url()->current() === route('admin.payment_methods.index'))
    <div class="modal fade" id="m_payment_method" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_payment_method_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_payment_method_header">
                    <h6 class="modal-title text-white" id="m_payment_method_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="payment_method_form" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label">Type *</label>
                            <input type="text" class="form-control" name="type"
                                placeholder="(Ex. Gcash, BDO, UnionBank)">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Account Name *</label>
                            <input type="text" class="form-control" name="account_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Account No. *</label>
                            <input type="text" class="form-control" name="account_no">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_payment_method btn-dark"
                        onclick="c_store('.payment_method_form','.payment_method_dt', 'admin.payment_methods.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_payment_method btn-primary"
                        onclick="c_update('.payment_method_form','.payment_method_dt', 'admin.payment_methods.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
@endif


@if (url()->current() === route('admin.admins.index'))
    {{-- Creating admin --}}
    <div class="modal fade" id="m_admin" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_admin_title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="m_admin_header">
                    <h6 class="modal-title text-white" id="m_admin_title">{{-- Modal Title --}}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-3">
                    <form class="admin_form" autocomplete="off">
                        <div class="form-group mb-2">
                            <label class="form-label">First Name</label>
                            <input class="form-control form-control-sm" type="text" name="first_name">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Middle Name</label>
                            <input class="form-control form-control-sm" type="text" name="middle_name">
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
                            <select class="form-control form-control-sm" name="municipality_id"
                                id="d_municipalities">
                                {{-- Display Municipality --}}
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Contact</label>
                            <input class="form-control form-control-sm" type="number" min="0" name="contact"
                                placeholder="Ex. 09659312005">
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-sm" type="email" name="email"
                                placeholder="you@email.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn float-end btn_add_admin btn-dark"
                        onclick="c_store('.admin_form','.admin_dt', 'admin.admins.store')">Submit</button>
                    <button type="button" class="btn float-end btn_update_admin btn-primary"
                        onclick="c_update('.admin_form','.admin_dt', 'admin.admins.update', event)">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Creating admin --}}
@endif
