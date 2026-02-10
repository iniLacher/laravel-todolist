<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

class TodolistServiceTest extends TestCase
{
  private TodolistService $TodolistService;
  protected function setUp(): void
  {
    parent::setUp();
    $this->TodolistService = $this->app->make(TodolistService::class);
  }

  public function testTodolistNotNull () {
    $this->assertNotNull($this->app->make(TodolistService::class));
  }

  public function testSaveTodo() {
    $this->TodolistService->saveTodo('1', 'test');

    $todolist = Session::get('todolist');
    $this->assertEquals($todolist[0]['id'], '1');
    $this->assertEquals($todolist[0]['todo'], 'test');
  }

  public function testTodolistEmpty() {
    $this->assertEquals([], $this->TodolistService->getTodolist());
  }

  public function testTodolistNotEmpty() {
    $expected = [
      [
        'id' => '1',
        'todo' => 'test'
      ],
      [
        'id' => '2',
        'todo' => 'KingAbdi'
      ]
    ];
    $this->TodolistService->saveTodo('1', 'test');
    $this->TodolistService->saveTodo('2', 'KingAbdi');
    $this->assertequals($expected, $this->TodolistService->getTodolist());
  }

  public function testRemoveTodo() {
    $this->TodolistService->saveTodo('1', 'test');
    $this->TodolistService->saveTodo('2', 'KingAbdi');
    $this->TodolistService->removeTodo('3');
    self::assertEquals(2, count($this->TodolistService->getTodolist()));
    $this->TodolistService->removeTodo('2');
    self::assertEquals(1, count($this->TodolistService->getTodolist()));
  }
}