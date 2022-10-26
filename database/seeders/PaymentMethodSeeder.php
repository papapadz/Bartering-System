<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $payment_methods = array(
            [
                'type' => 'Gcash',
                'account_name' => 'Albarter Gcash',
                'account_no' => '09659312003',
            ],
            [
                'type' => 'BDO',
                'account_name' => 'George Curbilla',
                'account_no' => '000011112222333',
            ],
            [
                'type' => 'Union Bank',
                'account_name' => 'Christine Balaoro',
                'account_no' => '0011223344556677',
            ],
        );

        PaymentMethod::insert($payment_methods);
        
        PaymentMethod::all()->each(fn(
            $payment_method) => $service->log_activity(model:$payment_method, event:'added', model_name: 'Payment Method', model_property_name: $payment_method->type)
        );
    }
}