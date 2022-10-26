<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Resources\FlashBarter\AdminFlashBarterResource;

class FlashBarterController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = AdminFlashBarterResource::collection(Payment::with('user')->where('paymentable_type', "App\Models\FlashBarter")->get());

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);
                    $route_show = route('admin.flash_barters.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>Manage Flash Barter</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.flash_barter.index');
    }

    public function show($id)
    {
        return view('admin.flash_barter.show', ['payment' => Payment::with('user.avatar', 'payment_method')->find($id)]);
    }

    public function update(PaymentRequest $request, $id, PaymentService $service)
    {
        $payment = Payment::find($id);

        $payment->update($request->validated());

        $service->handleFlashBarter(payment: $payment);

        $this->log_activity(model: $payment->paymentable, event: $request->status == Payment::CONFIRMED ? 'approved' : 'rejected', model_name: 'Flash Barter Request', model_property_name: $payment->paymentable_name);  // logs

        return to_route('admin.flash_barters.index')->with(['success' => 'Flash Barter Request Updated Successfully']);
    }
}