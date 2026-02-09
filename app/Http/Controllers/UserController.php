<?php

namespace App\Http\Controllers;

use dump;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
  private UserService $userService;
  public function __construct(UserService $userService) {
    $this->userService = $userService; 
  }
    public function login(): \Illuminate\Http\Response {
        return response()->view('user.login', ['title' => 'Login']);
    }
    
    public function doLogin(Request $request): Response | RedirectResponse {
        $username = $request->input('username');
        $password= $request->input('password');

        //validate input 
        if (empty ($username) || empty ($password)) {
            return response()->view('user.login', [
              'title' => 'Login',
              'error' => 'Username and password are required'
            ]); 
        }

        if ($this->userService->login($username, $password)) {
          $request->session()->put('username', $username);
          return redirect('/');
        }
        
        return response()->view('user.login', [
          'title' => 'Login',
          'error' => 'Invalid username or password'
        ]);

    }


    public function doLogout() {
      session()->forget('username');
      return redirect('/login');

    }
}
