<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user_role = new Role();
        $user_role->name = 'USER';
        $user_role->save();
        //
        $author_role = new Role();
        $author_role->name = 'AUTHOR';
        $author_role->save();
        //
        $admin_role =  new Role();
        $admin_role->name = 'ADMIN';
        $admin_role->save();
        //
        $super_admin_role = new Role();
        $super_admin_role->name = 'SUPER_ADMIN';
        $super_admin_role->save();
    }
}
