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
    ->assertSeeText('1')
    ->assertSeeText('1');
  }

  public function testAddTodoFailed() {
    $this->withSession([
      'username' => 'kingAbdi'
    ])->post('/todolist',[])
      ->assertSeeText('Todo cannot be empty');
  }

  public function testTodoSuccess() {
    $this->withSession([
      'username' => 'kingAbdi'
    ])->post('/todolist',[
      'todo' => 'test'
    ])
    ->assertRedirect('/todolist')
    ->assertSessionHas('todolist')
    ->assertSessionHas('username');
  }

  
}
