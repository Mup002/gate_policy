<?php
namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AuthController
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status_code' => 401,
                'message'=>'Unauthorized...'
            ]);
        }

        $user = User::where('email',$request->email)->first();

        if(!Hash::check($request->password,$user->password,[])){
            throw new Exception('Error in login');
        }

        try
        {
            $token = $user-> createToken('api-token');
            $accessToken = $user->tokens()->where('name', 'api-token')->latest()->first();
            $accessToken->expires_at = Carbon::now()->addMinutes(5);
            $accessToken->save();

            return response()->json([
                'status_code' => 200,
                'access_token' => $token->plainTextToken,
                'user'=>[
                    'username' => $user->name,
                    'email' => $user->email,
                    'role_id'=>$user->roles()->pluck('roles.role_id')
                ]
                ]);
        }
        catch(Exception $e){
            dd($e);
        }
    }

    public function logout(Request $request){
        auth()->user()->currentAccessToken()->delete();
        return [ 'message'=>'Youre logged out'];
    }
}
