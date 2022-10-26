<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;
use App\Services\ActivityLogsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $categories = array(
            ['id' => 1, 'name' => 'Bacacay', 'created_at' => now()],
            ['id' => 2, 'name' => 'Camalig', 'created_at' => now()],
            ['id' => 3, 'name' => 'Daraga', 'created_at' => now()],
            ['id' => 4, 'name' => 'Guinobatan', 'created_at' => now()],
            ['id' => 5, 'name' => 'Jovellar', 'created_at' => now()],
            ['id' => 6, 'name' => 'Legazpi', 'created_at' => now()],
            ['id' => 7, 'name' => 'Libon', 'created_at' => now()],
            ['id' => 8, 'name' => 'Ligao', 'created_at' => now()],
            ['id' => 9, 'name' => 'Malilipot', 'created_at' => now()],
            ['id' => 10, 'name' => 'Malinao', 'created_at' => now()],
            ['id' => 11, 'name' => 'Manito', 'created_at' => now()],
            ['id' => 12, 'name' => 'Oas', 'created_at' => now()],
            ['id' => 13, 'name' => 'Pioduran', 'created_at' => now()],
            ['id' => 14, 'name' => 'Polangui', 'created_at' => now()],
            ['id' => 15, 'name' => 'Rapu-Rapu', 'created_at' => now()],
            ['id' => 16, 'name' => 'Santo Domingo', 'created_at' => now()],
            ['id' => 17, 'name' => 'Tabaco', 'created_at' => now()],
            ['id' => 18, 'name' => 'Tiwi', 'created_at' => now()],
        );

        Municipality::insert($categories);

        Municipality::all()->each(fn(
            $municipality) => $service->log_activity(model:$municipality, event:'added', model_name: 'Municipality', model_property_name: $municipality->name)
        );
    }
}