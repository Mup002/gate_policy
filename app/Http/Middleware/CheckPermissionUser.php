<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckPermissionUser
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        $requitedPermissions = explode('|',$permission);
        if(!$requitedPermissions)
        {
            $requitedPermissions = [];
        }
        $user = User::with('roles.permissions')->find(Auth::user()->user_id);

        if(!$user)
        {
            // dd($user);
            return response()->json(['message'=>'Unauthenticated'],401);
        }
        $user = $this->extractPermissionsFromUser($user);
        $userPermissions = $user->permissions
        ->map(fn($permission)=>$permission->name)
        ->values()
        ->all();
        if(!count(array_intersect($userPermissions,$requitedPermissions))){
            return response()->json([
                'message'=>'Permission not granted',
                'permissions' => $requitedPermissions,
            ],401);
        }
        return $next($request);
    }
    public function extractPermissionsFromUser(User $user)
    {
        $permissions = collect();
        foreach($user->roles as $role)
        {
            $permissions = $permissions->merge($role->permissions);
        }

        $permissions = $permissions
        ->flatten()
        ->unique('permission_id')
        ->values();

        $user->permissions = $permissions;

        return $user;
    }
}
