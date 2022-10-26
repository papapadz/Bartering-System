<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $types = array(
            [
                'id' => 1, 
                'type' => 'Basic', 
                'fee' => 0.00, 
                'post_count' => 3,
                'boost_post' => false, 
                'flash_barter' => false, 
                'created_at' => now()
            ],
            [
                'id' => 2, 
                'type' => 'Pro', 
                'fee' => 99.00, 
                'post_count' => 6,
                'boost_post' => true, 
                'flash_barter' => true, 
                'created_at' => now()
            ],
        );

        SubscriptionType::insert($types);

        SubscriptionType::all()->each(fn(
            $type) => $service->log_activity(model:$type, event:'added', model_name: 'Subscription Type', model_property_name: $type->type)
        );
    }
}