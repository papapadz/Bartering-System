@extends('layouts.admin.app')

@section('title', 'Admin | Manage Administrator')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="float-right btn btn-sm btn-primary me-3" href="javascript:void(0)"
                            onclick="toggle_modal('#m_admin', '.admin_form', ['#m_admin_title','Add Administrator'], ['.btn_add_admin','.btn_update_admin'], {rname:'admin.admins.create', target:['#d_municipalities'], column:['name']})">Create
                            Administrator +</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-hover admin_dt">
                                <caption>List of Administrator <i class="fas fa-users ml-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Registered At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display List of Administrator --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection
