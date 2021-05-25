<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {
    	return view('pages.register');
    }

    public function store(Request $request) {
    	$request->validate(
            [
                'username'          =>      'required|email|unique:users,email',
                'password'          =>      'required|alpha_num|min:6',
                'confirm_password'  =>      'required|same:password'
            ], [
	            'username.unique' => 'The Email has already been taken.'
	        ]
        );

        $dataArray    =    array(
            "email"      =>          $request->username,
            "password"   =>          bcrypt($request->password),
            "enabled"    => 1,
            "role_id"	 => 1
        );

        $user  =  User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Success! Registration completed");
        }else {
            return back()->with("failed", "Alert! Failed to register");
        }
    }
}
