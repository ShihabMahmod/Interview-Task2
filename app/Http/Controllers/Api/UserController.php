<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Events\UserListUpdated;

use Carbon\Carbon;

class UserController extends Controller
{
    public function welcome()
    {
        return response()->json('Welcome to Task-2');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (! $token = Auth::guard('api')->attempt($credentials, ['exp' => Carbon::now()->addDays(365)->timestamp])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['token' => $token]);
    }

    public function index()
    {
        $users = User::all();
        event(new UserListUpdated($users));
        return response()->json($users);

    }
}
