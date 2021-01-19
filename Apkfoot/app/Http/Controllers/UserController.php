<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function user(){
         return UserResource::collection(User::get());
    }
      public function userById(request $request){
        return UserResource::collection(User::where('id',$request['id'])->get());
    }
}
