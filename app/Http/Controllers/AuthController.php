<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function login(Request $request){
        abort_if(!$request->email, '401', 'Email not valid');
        abort_if(!$request->password, '401', 'Password not valid');
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
    public function profile(){
        return response()->json(Auth::user());
    }
}
