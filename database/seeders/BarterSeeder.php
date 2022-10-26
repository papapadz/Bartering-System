<?php

namespace Database\Seeders;

use App\Models\Barter;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_post = Post::where('user_id', 2)->first()->id;
        $george_post = Post::where('user_id', 3)->first()->id;
        $christine_post = Post::where('user_id', 4)->first()->id;
        $ram_post = Post::where('user_id', 5)->first()->id;

        $barters = array(
            // Dev offered an item to George
            [
                'id' => 1,
                'post_id' => $george_post, 
                'bartered_post_id' => $dev_post, 
                'status' => Barter::ACCEPTED,
                'created_at' => now(),
            ],

            // Dev offered an item to Chrsitine
            [
                'id' => 2,
                'post_id' => $christine_post, 
                'bartered_post_id' => $dev_post, 
                'status' => Barter::ACCEPTED,
                'created_at' => now(),
            ],

            // Dev offered an item to Ram
            [
                'id' => 3,
                'post_id' => $ram_post, 
                'bartered_post_id' => $dev_post, 
                'status' => Barter::PENDING,
                'created_at' => now(),
            ],

            // George offered an item to Ram
            // [
            //     'id' => 4,
            //     'post_id' => $ram_post, 
            //     'bartered_post_id' => $george_post, 
            //     'status' => Barter::ACCEPTED,
            //     'created_at' => now(),
            // ],
        );

        Barter::insert($barters);
    }
}