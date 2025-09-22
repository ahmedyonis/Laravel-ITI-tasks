<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\UserResource;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index(){
        $users=User::all();
        return new UserResource($users);
    }
    function show($id){
        $users =user::find($id);
        return new UserResource($users);
    }
    function store(Request $request){
        
        User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return "done";
    }
    function update(Request $request,$id){

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return "done";
    }

}
