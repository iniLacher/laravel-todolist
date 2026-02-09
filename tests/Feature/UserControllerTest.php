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
//     protected function setUp(): void
// {
//     parent::setUp();
    
//     // Force bind UserService
//     $this->app->singleton(UserService::class, UserServiceImpl::class);
// }

    public function testLoginSuccess() {
      $this->post('/doLogin', [
        'username' => 'kingAbdi',
        'password' => 'rahasia'
      ])->assertRedirect('/')
        ->assertSessionHas('username', 'kingAbdi');
    }
}
