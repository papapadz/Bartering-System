<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoostedPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()
        ->doesntHave('active_boosted_posts')
        ->doesntHave('active_flash_barters')
        ->latest()
        ->take(12)
        ->get()
        ->each(function($post) {
            
            $boosted_post = $post->boosted_posts()->create([
                'date_start' => now(),
                'date_end' => now()->addDays(3),
                'day_count' => 3,
                'is_expired' => false,
            ]);

            $payment = $boosted_post->payment()->create([
                'user_id' => $post->user_id,
                'payment_method_id' => 1,
                'user_name' => $post->user->full_name,
                'paymentable_name' => $post->title,
                'amount' => 150,
                'transaction_no' => mt_rand(123456,999999),
                'reference_no' => mt_rand(123456,999999),
                'status' => Payment::CONFIRMED, // Payment::PENDING // Payment::REJECTED
            ]);

            activity()
            ->causedBy($payment->user)
            ->performedOn($boosted_post)
            ->withProperties(['ip' => request()->ip()])
            ->log($payment->user->full_name . " has requested a Flash Barter - " . $boosted_post->post->title); // log activity

            $payment->addMedia(public_path("/img/tmp_files/receipts/gcash.png"))->preservingOriginal()->toMediaCollection('payment_receipts');
        });
    }
}