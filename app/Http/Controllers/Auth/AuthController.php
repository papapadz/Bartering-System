<?php

namespace App\Http\Controllers\Auth;

use App\Services\PaymentService;
use App\Models\User;
use App\Models\Municipality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendEmailVerification;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\{Auth,Hash,Mail};


class AuthController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest')->except(['logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register', [
            'municipalities' => Municipality::pluck('name', 'id'),
            'payment_methods' => PaymentMethod::all(),
        ]);
    }

    public function attemptLogin(Request $request)
    {
        // redirect to desired page by specific role allowed by GATE
        $credentials = $request->only('email', 'password');
            
        if (Auth::attempt($credentials + ['is_activated' => true])) {
            //Auth::logoutOtherDevices($request->password);

            $request->session()->regenerate();

            return match (auth()->user()->role->name) {
                'admin' => to_route('admin.dashboard.index'),
                'user' => redirect('barter/posts')
            };
        } else {
            $request->session()->flush();
            return redirect('/login')->with('error', 'The Username / Password do not match');
        }
    }

    public function attemptRegister(AuthRequest $request, PaymentService $service)
    {
        $form_data = $request->validated();

        if(!in_array($form_data['subscription_type'], ['basic', 'pro'])) {
            return back()->with(['error' => 'Invalid Subscription Type']);
        } 
        
        $form_data['password'] = Hash::make($form_data['password']);

        $form_data['verification_token'] = Str::uuid();

        $user = User::create($form_data + ['role_id' => \App\Models\Role::USER]);

        Mail::to($user->email)->send(new SendEmailVerification(user: $user, email_verification_route: route('auth.email_verification', $form_data['verification_token'])));  // send email verification

        if($request->subscription_type === 'basic') 
        {
            $user->subscriptions()->create(['subscription_type_id' => \App\Models\SubscriptionType::BASIC, 'due' => now()->addYear()]); // registered for a year

            return back()->with(['success' => 'Registration submitted successfully. A fresh verification link has been sent to your email address. Verify first your email address to complete your registration.']);
        }

        if($request->subscription_type === 'pro') 
        {
            $subscription = $user->subscriptions()->create(['subscription_type_id' => \App\Models\SubscriptionType::PRO, 'due' => now()->addMonth()]); // registered for a month as pro user

            $service->handle(user: $user, paymentable: $subscription, paymentable_type: 'subscription', request_input: $request);  // process payment

            return back()->with(['success' => 'Registration submitted successfully. A fresh verification link has been sent to your email address. Verify first your email address to complete your registration. You will be receiving an email notification once there is an update from your Pro Subscription request.']);
        }

    }

    public function emailVerification($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return to_route('auth.login')->with('error', 'Invalid Token!'); // redirect to login
        }

        if($user->current_subscription->subscription_type->type == 'basic')
        {
            $user->update(['is_activated' => true, 'email_verified_at' => now(), 'verification_token' => null]);
            return to_route('auth.login')->with('success', 'Account activated successfully: You can now login to our platform'); // redirect to login
        }
        else
        {
            $user->update(['is_activated' => false, 'email_verified_at' => now(), 'verification_token' => null]);
            return to_route('auth.login')->with('success', 'Email verified successfully. You will be receiving an email notification once there is an update from your Pro Subscription request.'); // redirect to login
        }
    }

   
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return to_route('auth.login');
        
    }
}