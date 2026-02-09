<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\UserService;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\Implementation\UserServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    public function testLogin() {
        $this->get('/login')->assertSeeText('Login')->assertSeeText('King Abdi');
    }
    public function testMiddlewareMemberLogin() {
      $this->withSession(['username' => 'kingAbdi'])
            ->get('/login')
            ->assertRedirect('/');
    }

    public function testLoginSuccess() {
      $this->post('/login', [
        'username' => 'kingAbdi',
        'password' => 'rahasia'
      ])->assertRedirect('/')
        ->assertSessionHas('username', 'kingAbdi');
    }

    public function testLogout() {
      $this->withSession(['username' => 'kingAbdi'])
            ->post('/logout')
            ->assertSessionMissing('username')
            ->assertRedirect('/login');
    }
    public function testLogoutGuest() {
      $this->post('/logout')
            ->assertRedirect('/login');
    }

    
}
