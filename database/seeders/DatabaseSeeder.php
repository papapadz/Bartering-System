<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run Seeders
       
        $this->call([
            
            /** Start User Management Seeder */
                PaymentMethodSeeder::class,
                MunicipalitySeeder::class,
                SubscriptionTypeSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,
                SubscriptionSeeder::class,
            /** End User Management Seeder */

            /** Start Barter Management Seeder */
                CategorySeeder::class,
                PostSeeder::class,
                BoostedPostSeeder::class,
                FlashBarterSeeder::class,
                // LikeSeeder::class,
                BarterSeeder::class,
                RatingSeeder::class,
            /** End Barter Management Seeder */

                AdSeeder::class,
            // AnnouncementSeeder::class,

        ]);

    }
}