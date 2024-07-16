<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $superadmin = User::create([
        //     'name' => 'superadmin',
        //     'email'=>'superadmin@gmail.com',
        //     'password'=> Hash::make('1234'),
        // ]);
        // DB::table('user_role')->insert([
        //     'user_id'=>$superadmin->user_id,
        //     'role_id'=> 4,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        // $admin1 = User::create([
        //     'name' => 'admin1',
        //     'email'=>'admin1@gmail.com',
        //     'password'=> Hash::make('1234'),
        // ]);
        // DB::table('user_role')->insert([
        //     'user_id'=>$admin1->user_id,
        //     'role_id'=> 3,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        $admin2 = User::create([
            'name' => 'admin2',
            'email'=>'admin2@gmail.com',
            'password'=> Hash::make('1234'),

        ]);
        DB::table('user_role')->insert([
            'user_id'=>$admin2->user_id,
            'role_id'=> 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user1 = User::create([
            'name' => 'user1',
            'email'=>'user1@gmail.com',
            'password'=> Hash::make('1234'),

        ]);
        DB::table('user_role')->insert([
            'user_id'=>$user1->user_id,
            'role_id'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user2 = User::create([
            'name' => 'user2',
            'email'=>'user2@gmail.com',
            'password'=> Hash::make('1234'),

        ]);
        DB::table('user_role')->insert([
            'user_id'=>$user2->user_id,
            'role_id'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user3 = User::create([
            'name' => 'user3',
            'email'=>'user3@gmail.com',
            'password'=> Hash::make('1234'),
         
        ]);
        DB::table('user_role')->insert([
            'user_id'=>$user3->user_id,
            'role_id'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
