<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function getIndex()
    {
         //dd(User::all()); //dump() print_r() var_damp()
         return UserResource::collection(User::all());
    }
    public function getOne(User $user){
        return new UserResource($user);
    }
}
