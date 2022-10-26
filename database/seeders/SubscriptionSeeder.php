<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\SubscriptionType;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $categories = array(
            [
                'id' => 1, 
                'user_id' => 2, 
                'subscription_type_id' => SubscriptionType::PRO, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], // dev is a basic user
            [
                'id' => 2, 
                'user_id' => 3, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], // george is a basic user
            [
                'id' => 3, 
                'user_id' => 4, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], // christine is a basic user
            [
                'id' => 4, 
                'user_id' => 5, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], // ram is a basic user
            [
                'id' => 5, 
                'user_id' => 6, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], // crestine mae is a basic user


            // Other Users
            [
                'id' => 6, 
                'user_id' => 7, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ], 
            [
                'id' => 7, 
                'user_id' => 8, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 8, 
                'user_id' => 9, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 9, 
                'user_id' => 10, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 10, 
                'user_id' => 11, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 11, 
                'user_id' => 12, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 12, 
                'user_id' => 13, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 13, 
                'user_id' => 14, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 14, 
                'user_id' => 15, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 15, 
                'user_id' => 16, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 16, 
                'user_id' => 17, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 17, 
                'user_id' => 18, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 18, 
                'user_id' => 19, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            [
                'id' => 19, 
                'user_id' => 20, 
                'subscription_type_id' => SubscriptionType::BASIC, 
                'due' => now()->addYear(), 
                'created_at' => now()
            ],
            // [
            //     'id' => 20, 
            //     'user_id' => 21, 
            //     'subscription_type_id' => SubscriptionType::BASIC, 
            //     'due' => now()->addYear(), 
            //     'created_at' => now()
            // ],
            
        );

        Subscription::insert($categories);

    }
}