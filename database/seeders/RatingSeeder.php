<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = array(

            // Dev Ace rated George C

            [
                'sender_id' => 2,
                'receiver_id' => 3,
                'rating' => mt_rand(1,5),
                'comment' => 'mabait na barterer',
                'created_at' => now()
            ],
            // Dev Ace rated Christine B
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'rating' => mt_rand(1,5),
                'comment' => 'legit barterer mabait!',
                'created_at' => now()
            ],

            // Dev Ace rated Ram B
            [
                'sender_id' => 2,
                'receiver_id' => 5,
                'rating' => mt_rand(1,5),
                'comment' => 'good barterer',
                'created_at' => now()
            ],

            // Dev rated John Doe
            [
                'sender_id' => 2,
                'receiver_id' => 7,
                'rating' => mt_rand(1,5),
                'comment' => 'mabait na barterer',
                'created_at' => now()
            ],

            // George C rated Dev Ace
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'rating' => mt_rand(1,5),
                'comment' => 'mabait na barterer to si boss Dev',
                'created_at' => now()
            ],

            // George C rated Christine B

            [
                'sender_id' => 3,
                'receiver_id' => 4,
                'rating' => mt_rand(1,5),
                'comment' => 'mabait to si maam christine',
                'created_at' => now()
            ],

            // George C rated Ram B

            [
                'sender_id' => 3,
                'receiver_id' => 5,
                'rating' => mt_rand(1,5),
                'comment' => 'legit',
                'created_at' => now()
            ],

            // Christine B rated Dev
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'rating' => mt_rand(1,5),
                'comment' => 'safe basta si sir Dev',
                'created_at' => now()
            ],

            // Christine B rated George C
            [
                'sender_id' => 4,
                'receiver_id' => 3,
                'rating' => mt_rand(1,5),
                'comment' => 'ok na ok makipag deal kay George',
                'created_at' => now()
            ],

            // Ram B rated Christine
            [
                'sender_id' => 5,
                'receiver_id' => 4,
                'rating' => mt_rand(1,5),
                'comment' => 'safe deal with maam Christine',
                'created_at' => now()
            ],

            // Ram B rated Crestine
            [
                'sender_id' => 5,
                'receiver_id' => 6,
                'rating' => mt_rand(1,5),
                'comment' => 'legit po si maam Crestine',
                'created_at' => now()
            ],


            // Crestine N rated Ram B

            [
                'sender_id' => 6,
                'receiver_id' => 5,
                'rating' => mt_rand(1,5),
                'comment' => 'nice deal sir Ram',
                'created_at' => now()
            ],

        );

        Rating::insert($ratings);
    }
}