<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Payment;
use App\Services\ActivityLogsService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlashBarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        Post::query()
        ->doesntHave('active_boosted_posts')
        ->doesntHave('active_flash_barters')
        ->latest()->take(12)
        ->get()
        ->each(function($post) {
            
            $flash_barter = $post->flash_barters()->create([
                'date_start' => now()->subDay(),
                'date_end' => now(),
                'day_count' => 1,
                'is_expired' => false,
                'created_at' => now()->subDay()
            ]);

            $payment = $flash_barter->payment()->create([
                'user_id' => $post->user_id,
                'payment_method_id' => 1,
                'user_name' => $post->user->full_name,
                'paymentable_name' => $post->title,
                'amount' => 50,
                'transaction_no' => mt_rand(123456,999999),
                'reference_no' => mt_rand(123456,999999),
                'status' => Payment::CONFIRMED, // Payment::PENDING // Payment::REJECTED
            ]);

                
            activity()
            ->causedBy($payment->user)
            ->performedOn($flash_barter)
            ->withProperties(['ip' => request()->ip()])
            ->log($payment->user->full_name . " has requested a Flash Barter - " . $flash_barter->post->title); // log activity

            $payment->addMedia(public_path("/img/tmp_files/receipts/gcash.png"))->preservingOriginal()->toMediaCollection('payment_receipts');
        });
    }
}