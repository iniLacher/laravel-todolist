<?php
namespace App\Services;

Interface UserService {
    
    function login(string $user, string $password): bool;
}