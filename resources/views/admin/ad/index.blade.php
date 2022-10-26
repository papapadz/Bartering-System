@extends('layouts.admin.app')

@section('title', 'Admin | Advertisement ⚡')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        @include('layouts.includes.alert')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover ad_dt">
                                <caption>List of Advertisement ⚡</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction No.</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Due</th>
                                        <th>Post Status</th>
                                        <th>Payment Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Ads --}}
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
