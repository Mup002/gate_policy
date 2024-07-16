<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class,'user_role','role_id','user_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }
}
