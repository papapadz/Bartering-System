<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\BoostedPost\AdminBoostedPostResource;

class BoostedPostController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $payments = AdminBoostedPostResource::collection(Payment::with('user')->where('paymentable_type', "App\Models\BoostedPost")->get());

            return DataTables::of($payments)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);
                    $route_show = route('admin.boosted_posts.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show'>Manage Boosted Post</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.boosted_post.index');
    }

    public function show($id)
    {
        return view('admin.boosted_post.show', ['payment' => Payment::with('user.avatar', 'payment_method')->find($id)]);
    }

    public function update(PaymentRequest $request, $id, PaymentService $service)
    {
        $payment = Payment::find($id);

        $payment->update($request->validated());

        $service->handleBoostedPost(payment: $payment);
        
        $this->log_activity(model: $payment->paymentable, event: $request->status == Payment::CONFIRMED ? 'approved' : 'rejected', model_name: 'Boosted Post Request', model_property_name: $payment->paymentable_name);  // logs

        return to_route('admin.boosted_posts.index')->with(['success' => 'Boosted Post Request Updated Successfully']);
    }

}