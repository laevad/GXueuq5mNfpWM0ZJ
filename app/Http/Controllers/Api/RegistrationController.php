<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function store(Request $request){
        $validator = \Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            $err = [
                'firstname' => $errors->first('firstname'),
                'lastname' => $errors->first('lastname'),
                'email' => $errors->first('email'),
                'password' => $errors->first('password'),
            ];
            return \response()->json([
                'message' =>'Can\'t process, check your input ',
                'errors' => $err,
            ], 422);
        }
        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->save();
        return \response()->json([
            'message' =>'Registration Successful',
            'user' => $user,
        ], 201);

    }
}
