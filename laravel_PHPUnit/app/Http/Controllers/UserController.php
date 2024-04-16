<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function index(){
        return UserResource::collection(resource:User::all());
    }

    // public function show(string $id){
    //     return new UserResource(resource:User::where('id', $id)->first());
    // }

    public function show(User $user){
        return new UserResource($user);
    }
}
