<?php

namespace App\Services\Implementation;
use App\Services\UserService;

class UserServiceImpl implements UserService {
    private array $users = [
        'kingAbdi' => 'rahasia'
        ];
    function login(string $user, string $password): bool
    {
       if(!isset($this->users[$user]))  {
           return false;
       }

       $correctPassword = $this->users[$user];              
        // jika pengen simpel kek gini aja
        // return $password === $correctPassword;
       if($password === $correctPassword) {
        return true;
       } else {
        return false;
       }
    }
    
}