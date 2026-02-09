<?php
namespace App\Services\implementation;

use App\Services\TodolistService;

class TodolistServiceImpl implements TodolistService {
  public function index() {
    return 'Todolist';
  }
}