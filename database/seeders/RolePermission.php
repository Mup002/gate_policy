<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;
class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superadmin = Role::find(4)->first();
        $permissions = Permission::all();
        foreach($permissions as $permission)
        {
            DB::table('permission_role')->insert([
                'role_id' => 4,
                'permission_id' => $permission->permission_id,
                'created_at'=> now(),
                'updated_at'=>now(),
            ]);
        }

    }
}
