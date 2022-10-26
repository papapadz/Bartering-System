<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $categories = array(
            ['id' => 1, 'name' => 'Babies & Kids', 'created_at' => now()],
            ['id' => 2, 'name' => 'Books', 'created_at' => now()],
            ['id' => 3, 'name' => 'Groceries', 'created_at' => now()],
            ['id' => 4, 'name' => 'Health & Personal Care', 'created_at' => now()],
            ['id' => 5, 'name' => 'Home Appliances', 'created_at' => now()],
            ['id' => 6, 'name' => 'Home & Living', 'created_at' => now()],
            ['id' => 7, 'name' => 'Laptop & Computers', 'created_at' => now()],
            ['id' => 8, 'name' => 'Mobiles & Gadgets', 'created_at' => now()],
            ['id' => 9, 'name' => 'Pet Care & Accesories', 'created_at' => now()],
            ['id' => 10, 'name' => 'School Materials', 'created_at' => now()],
            ['id' => 11, 'name' => 'Toolkits', 'created_at' => now()],
            ['id' => 12, 'name' => 'Sports & Travel', 'created_at' => now()],
        );

        Category::insert($categories);

        Category::all()->each(fn(
            $category) => $service->log_activity(model:$category, event:'added', model_name: 'Category', model_property_name: $category->name)
        );
    }
}