<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        // Define a cache key
        $cacheKey = 'users_list';

        // Attempt to get the users list from Redis cache
        $users = Cache::get($cacheKey);

        if (!$users) {
            // If not found in cache, fetch from the database
            $users = User::all();

            // Store the users list in Redis cache for 10 minutes
            Cache::put($cacheKey, $users, now()->addMinutes(10));
        }

        // Return the users list as a JSON response
        return response()->json($users);

    }
}
