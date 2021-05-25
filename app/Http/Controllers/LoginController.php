<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function create() {
    	return view('pages.login');
    }

    public function handle(Request $request) {
    	$request->validate(
            [
                'username'          =>      'required|email',
                'password'          =>      'required|alpha_num'
            ]
        );

        $remember = ($request->has('remember')) ? true : false;
 		$info  =  array(
            "email"      =>     $request->username,
            "password"   =>     $request->password
        );

        if (Auth::attempt($info, $remember)) {
        	return redirect()->route('home');
        }else {
            return back()->with("failed", "Email or Password not correct!");
        }
    }
}
