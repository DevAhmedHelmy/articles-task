<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth', ["only" => ['logout']]);
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'token' => bin2hex(random_bytes(40))
        ]);
        return response()->json(['message' => 'Data added successfully', 'data' => $user, 'access_token' => $user->token], 201);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'Login failed'], 401);
        }

        $isValidPassword = Hash::check($password, $user->password);
        if (!$isValidPassword) {
            return response()->json(['message' => 'Login failed'], 401);
        }

        $generateToken = bin2hex(random_bytes(40));

        $user->update([
            'token' => $generateToken
        ]);
        return response()->json(['message' => 'Login successfully', 'data' => $user, 'access_token' => $user->token], 201);
    }
    public function logout()
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'Not authorized'], 401);
        }
        DB::table("users")->where('id', auth()->user()->id)->update(["token" => null]);

        return response()->json('Logged Out', 200);
    }
}
