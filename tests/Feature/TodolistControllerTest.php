<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
  public function testTodolist() {
    $this->withSession([
      'username' => 'kingAbdi',
      'todolist' => [
      [
        'id' => "1",
        'todo' => "test"
      ]]
    ])->get('/todolist')
    ->assertSeeText('test')
    ->assertSeeText('1');
  }
}
