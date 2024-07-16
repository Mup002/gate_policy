<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $userService;
    public function __construct(UserService $userServices)
    {
        $this->userService = $userServices;
    }
    public function getAllUsers()
    {
        $rs = $this->userService->getUsers();
        return response()->json($rs);
    }
}
