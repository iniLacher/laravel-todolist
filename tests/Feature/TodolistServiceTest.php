<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodolistServiceTest extends TestCase
{
  protected function setUp(): void
  {
    parent::setUp();
  }

  public function testTodolistNotNull () {
    $this->assertNotNull($this->app->make(TodolistService::class));
  }
}
