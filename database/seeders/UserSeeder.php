<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Services\ActivityLogsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogsService $service)
    {
        $users = array(
            // generate sample admin
             [
                'id' => 1,
                'first_name' => 'Admin',
                'middle_name' => 'D',
                'last_name' => 'Admin',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 1,
                'contact' => '09666856119',
                'password' => Hash::make('test1234'),
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::ADMIN,
                'created_at' => now()
             ],
 
           // generate sample user (barterer)
             [
                'id' => 2,
                'first_name' => 'Royland',
                'middle_name' => 'D',
                'last_name' => 'Pepano',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 5,
                'contact' => '09659312003',
                'email' => 'roylandpepano@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],

             [
                'id' => 3,
                'first_name' => 'George',
                'middle_name' => 'E',
                'last_name' => 'Corbilla',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 3,
                'contact' => '09187494841',
                'email' => 'corbillageorge03@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonth()
             ],
             [
                'id' => 4,
                'first_name' => 'Christine',
                'middle_name' => 'B',
                'last_name' => 'Balaoro',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 2,
                'contact' => '09092384829',
                'email' => 'christinebalaoro04@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonth()
             ],
             [
                'id' => 5,
                'first_name' => 'Ram',
                'middle_name' => 'B',
                'last_name' => 'Bolon',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 12,
                'contact' => '09291431074',
                'email' => 'goldenskiesahead@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonth()
             ],
             [
                'id' => 6,
                'first_name' => 'Crestine',
                'middle_name' => 'N',
                'last_name' => 'Nebres',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 14,
                'contact' => '09669865868',
                'email' => 'crestine.mae.nebres@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 7,
                'first_name' => 'John',
                'middle_name' => 'N',
                'last_name' => 'Doe',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 15,
                'contact' => '09666856119',
                'email' => 'user@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 8,
                'first_name' => 'Joseph',
                'middle_name' => 'N',
                'last_name' => 'Doe',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 9,
                'contact' => '09666856119',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 9,
                'first_name' => 'Jane',
                'middle_name' => 'N',
                'last_name' => 'Doe',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 10,
                'contact' => '09666856119',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 10,
                'first_name' => 'Jessica',
                'middle_name' => 'N',
                'last_name' => 'Doe',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 11,
                'contact' => '09666856119',
                'email' => 'user4@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 11,
                'first_name' => 'Mark',
                'middle_name' => 'N',
                'last_name' => 'Doe',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 8,
                'contact' => '09666856119',
                'email' => 'user5@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(2)
             ],
             [
                'id' => 12,
                'first_name' => 'Michelle',
                'middle_name' => 'N',
                'last_name' => 'Yue',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 4,
                'contact' => '09666856119',
                'email' => 'user6@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(2)
             ],
             [
                'id' => 13,
                'first_name' => 'Andy',
                'middle_name' => 'N',
                'last_name' => 'Yue',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 3,
                'contact' => '09666856119',
                'email' => 'user7@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(3)
             ],
             [
                'id' => 14,
                'first_name' => 'Sue',
                'middle_name' => 'N',
                'last_name' => 'Ramirez',
                'gender' => 'female',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 1,
                'contact' => '09666856119',
                'email' => 'user8@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(3)
             ],
             [
                'id' => 15,
                'first_name' => 'Johny',
                'middle_name' => 'N',
                'last_name' => 'Sins',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 1,
                'contact' => '09666856119',
                'email' => 'user9@gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(3)
             ],
             [
                'id' => 16,
                'first_name' => 'Ryan',
                'middle_name' => 'N',
                'last_name' => 'Rems',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 18,
                'contact' => '09666856119',
                'email' => 'user10gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 17,
                'first_name' => 'Andy',
                'middle_name' => 'N',
                'last_name' => 'Baldwin',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 17,
                'contact' => '09666856119',
                'email' => 'user11gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()->subMonths(4)
             ],
             [
                'id' => 18,
                'first_name' => 'John',
                'middle_name' => 'N',
                'last_name' => 'Lenon',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 13,
                'contact' => '09666856119',
                'email' => 'user12gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 19,
                'first_name' => 'Robert',
                'middle_name' => 'N',
                'last_name' => 'Kiyosaki',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 1,
                'contact' => '09666856119',
                'email' => 'user13gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
             [
                'id' => 20,
                'first_name' => 'Huggy',
                'middle_name' => 'N',
                'last_name' => 'Wuggy',
                'gender' => 'male',
                'birth_date' => '2000-01-01',
                'address' => 'Sample Address',
                'municipality_id' => 10,
                'contact' => '09666856119',
                'email' => 'user14gmail.com',
                'password' => Hash::make('test1234'),
                'email_verified_at' => now(),
                'is_activated' => true, 
                'role_id' => Role::USER,
                'created_at' => now()
             ],
          );
 
          User::insert($users);

          User::all()->each(function($user) use($service){
            $user
            ->addMedia(public_path("/img/tmp_files/avatars/$user->id.png"))
            ->preservingOriginal()
            ->toMediaCollection('avatar_image');

            $service->log_activity(model:User::find(1), event:'added', model_name: 'User', model_property_name: $user->name ?? 'Administrator');
        });
    }
}