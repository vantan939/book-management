<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function create() {
        if (!isGuest()) return redirect()->route('home');
        return view('pages.login');   	
    }

    public function handle(Request $request) {
    	$request->validate(
            [
                'username'          =>      'required|email',
                'password'          =>      'required'
            ]
        );

 		$info  =  array(
            "email"      =>     $request->username,
            "password"   =>     $request->password
        );

        if (Auth::attempt($info)) {
        	return redirect()->route('home');
        }else {
            return back()->with("failed", "Email or Password not correct!");
        }
    }
}
