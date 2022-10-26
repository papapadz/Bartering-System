@extends('layouts.admin.app')

@section('title', 'Admin | Payments')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover payment_dt">
                                <caption>List of Payment Transaction</caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Transaction No.</th>
                                        <th>User</th>
                                        <th>Paymentable</th>
                                        <th>Paymentable Type</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display Payments --}}
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
