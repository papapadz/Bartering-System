<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Resources\Payment\PaymentResource;

class PaymentController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = PaymentResource::collection(Payment::with('user')->get());

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {
                    $new_row = collect($row);
                    $route_show = route('admin.payments.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>View</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.payment.index');
    }

    public function show(Payment $payment)
    {
        return view('admin.payment.show', ['payment' => $payment->load('user.avatar')]);
    }
}