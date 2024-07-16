<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name'=>'user-view']);
        Permission::create(['name'=>'author-edit']);
        Permission::create(['name'=>'author-create']);
        Permission::create(['name'=>'author-delete']);
        Permission::create(['name'=>'admin-view']);
        Permission::create(['name'=>'admin-edit']);
        Permission::create(['name'=>'admin-delete']);
        Permission::create(['name'=> 'admin-create']);
    }
}
