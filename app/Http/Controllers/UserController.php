<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(): \Illuminate\Http\Response {
        return response()->view('user.login', ['title' => 'Login']);
    }
    
    public function doLogin() {
        return 'Hi from doLogin';

    }


    public function doLogout() {
        return 'Hi from logout';

    }
}
