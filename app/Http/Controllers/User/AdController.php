<?php

namespace App\Http\Controllers\User;

use App\Models\ad;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\PaymentService;
use App\Http\Requests\Ad\AdRequest;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;

class AdController extends Controller
{
    public function index()
    {
        return view('user.ad.index', [
            'ads' => Ad::with('media')->whereBelongsTo(auth()->user())->get(),
        ]);
    }

    public function create()
    {
        return view('user.ad.create', [
            'payment_methods' => PaymentMethod::all(),
        ]);
    }

    public function store(AdRequest $request, PaymentService $service)
    {
       $ad = auth()->user()->ads()->create($request->validated() + [
        'slug' => Str::slug($request->title),
        'date_start' => now()->addDay(), 
        'date_end' => now()->addDays($request->day_count + 1),
    ]);

       if($request->ads) {
             $service->handleImageUpload(model:$ad, images:$request->ads, collection:'ad_images', conversion_name:'card', action:'create');
       }

       $service->handle(user: auth()->user(), paymentable: $ad, paymentable_type: 'ads', request_input: $request);  // process payment

       return to_route('user.ads.index')->with('success', 'Ad Added Successfully');
    }

    public function show(Ad $ad)
    {
        return view('user.ad.show', [
            'ad' => $ad->load('user.media', 'media', 'payment.payment_method')
        ]);
    }

    public function edit(Ad $ad)
    {
        return view('user.ad.edit', ['ad' => $ad]);
    }

    public function update(AdRequest $request, Ad $ad, ImageUploadService $service)
    {
        $ad->update($request->validated());

        if($request->image) {
            $service->handleImageUpload(model:$ad, images:$request->image, collection:'ad_images', conversion_name:'card', action:'update');
        }

        return to_route('user.ads.index')->with('success', 'Ad Updated Successfully');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return back()->with('success', 'Ad Deleted Successfully');
    }
}