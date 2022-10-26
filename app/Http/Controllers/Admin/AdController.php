<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Services\PaymentService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ad\AdminAdResource;
use App\Http\Requests\Payment\PaymentRequest;

class AdController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = AdminAdResource::collection(Payment::with('user')->where('paymentable_type', "App\Models\Ad")->get());

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);
                    $route_show = route('admin.ads.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>Manage Advertisement</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.ad.index');
    }

    public function show($id)
    {
        return view('admin.ad.show', ['payment' => Payment::with('user.avatar', 'payment_method')->find($id)]);
    }

    public function update(PaymentRequest $request, $id, PaymentService $service)
    {
        $payment = Payment::find($id);

        $payment->update($request->validated());

        $service->handleAdvertisement(payment: $payment);

        return to_route('admin.ads.index')->with(['success' => 'Advertisement Request Updated Successfully']);
    }
}