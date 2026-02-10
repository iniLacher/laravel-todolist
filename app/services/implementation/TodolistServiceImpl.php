<?php
namespace App\Services\implementation;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService {
    public function saveTodo(string $id, string $todo): void {
      if(!Session::exists('todolist')) {
        Session::put('todolist', []);
      }

      Session::push('todolist', [
        'id' => $id, 
        'todo' => $todo
        ]);
    }


    public function getTodolist(): array {
      return Session::get('todolist', []);
    }

    public function removeTodo(string $idTodo) {
      $todolist = Session::get('todolist');
      foreach($todolist as $key => $value) {
        if($value['id'] == $idTodo) {
          unset($todolist[$key]);
          break;
        }
      }
      Session::put('todolist', $todolist);
    }

}