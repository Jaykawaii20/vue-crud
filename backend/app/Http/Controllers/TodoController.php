<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function getTodo()
    {
        return response()->json(todo::all(), 200);
    }

    public function getTodoId($id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo Content not found'], 404);
        }
        return response()->json(Todo::find($id), 200);
    }

    public function addTodo(Request $request)
    {
        $todo = Todo::create($request->all());
        return response($todo, 201);
    }

    public function updateTodo(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo Content not found'], 404);
        }
        $todo->update($request->all());
        return response($todo, 200);
    }


    public function deleteTodo(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo Content not found'], 404);
        }
        $todo->delete();
        return response()->json(null, 204);
    }
}
