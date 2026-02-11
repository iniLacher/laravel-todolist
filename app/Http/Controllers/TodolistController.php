<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodolistService;

class TodolistController extends Controller
{
  private TodolistService $todolistService;

  public function __construct(TodolistService $todolistService) {
    $this->todolistService = $todolistService;
  }

  public function Todolist (Request $request) {
    $todolist = $this->todolistService->getTodolist();
    return response()->view('todolist.todolist', [
      'title' => 'Todolist',
      'todolist' => $todolist
    ]);
  }
   
  public function addTodo(Request $request) {
    $todo = $request->input('todo');
    if(empty($todo)) {
    $todolist = $this->todolistService->getTodolist();
    return response()->view('todolist.todolist', [
      'title' => 'Todolist',
      'todolist' => $todolist,
      'error' => 'Todo cannot be empty'
    ]);
    }

    $this->todolistService->saveTodo(uniqid(), $todo);
    return redirect()->action([TodolistController::class, 'Todolist']);
  }

  public function removeTodo(Request $request, $idTodo) {
    $this->todolistService->removeTodo($idTodo);
    return redirect()->action([TodolistController::class, 'Todolist']);
  }
}
