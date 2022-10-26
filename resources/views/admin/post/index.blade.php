@extends('layouts.admin.app')

@section('title', 'Admin | Manage Post')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <select class="form-control form-control-sm" onchange="getPostByStatus(this)">
                                    <option value="" disabled selected>--- Filter ---
                                    </option>
                                    <option value="0">Waiting for Approval</option>
                                    <option value="1">Approved</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-flush table-hover post_dt">
                                <caption>List of Post</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Featured Photo</th>
                                        <th>Owner</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Posts --}}
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
