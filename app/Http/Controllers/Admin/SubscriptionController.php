<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentSubscription\PaymentSubscriptionRequest;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Subscription\AdminSubscriptionResource;
use App\Services\PaymentService;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = AdminSubscriptionResource::collection(Payment::with('user')->where('paymentable_type', "App\Models\Subscription")->get());

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);
                    $route_show = route('admin.subscriptions.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>Manage Subscription</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.subscription.index');
    }

    public function show($id)
    {
        return view('admin.subscription.show', ['payment' => Payment::with('user.avatar')->find($id)]);
    }

    public function update(PaymentSubscriptionRequest $request, $id, PaymentService $service)
    {
        $payment = Payment::find($id);

        $payment->update($request->validated());

        $service->handleSubscription(payment: $payment);

        $this->log_activity(model: $payment->paymentable, event: $request->status == Payment::CONFIRMED ? 'approved' : 'rejected', model_name: 'Subscription Request', model_property_name: $payment->paymentable_name);  // logs

        return to_route('admin.subscriptions.index')->with(['success' => 'Subscription Record Updated Successfully']);
    }
}