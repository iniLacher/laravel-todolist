<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
   public function testGuest() {
    $this->withSession(['username' => 'kingAbdi'])
      ->get('/')
      ->assertRedirect('/login');
   }

   public function testMember() {
    $this->withSession(['username' => 'kingAbdi'])
      ->get('/')
      ->assertRedirect('/todolist');
   }
}
