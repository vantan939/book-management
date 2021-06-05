<?php

use App\Models\Role;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (! function_exists('id_user_current')) {
    function get_idUser_current() {
        return Auth::check() ? Auth::user()->id : 0;
    }
}

if (! function_exists('get_roleIdUser_current')) {
    function get_roleIdUser_current() {
        if(Auth::check()) return User::find(get_idUser_current())->role_id;
    }
}

if (! function_exists('isAdmin')) {
    function isAdmin() {
        return (Auth::check() && Role::find(get_roleIdUser_current())->name == 'Admin') ? 1 : 0;
    }
}

if (! function_exists('isUser')) {
    function isUser() {
        return (Auth::check() && Role::find(get_roleIdUser_current())->name == 'User') ? 1 : 0;
    }
}

if (! function_exists('isGuest')) {
    function isGuest() {
        return !Auth::check() ? 1 : 0;
    }
}

if (! function_exists('getUserType')) {
    function getUserType() {
        $type = 'guest';
        if(isAdmin()) {
            $type = 'admin';
        }else if(isUser()) {
            $type = 'normal';
        }

        return $type;
    }
}

if (! function_exists('getFullName')) {
    function getFullName() {
        $fullname = '';
        if(Auth::check()) {
            $fullname = (empty(Auth::user()->firstName) && empty(Auth::user()->lastName)) 
            ? Auth::user()->email 
            : Auth::user()->firstName. ' '. Auth::user()->lastName;
        }

        return $fullname;
    }
}