<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() 
    {
        $todos = Todo::all();
        
        return response()->json(['todos' => $todos]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);

        Todo::create($data);
        return response()->json([
            'data' => $data,
            'message' => 'Your data'
            ]);

        // $todo = new Todo();
        // $todo->title = $request->title;
        // $todo->completed = $request->completed;
        // $todo->save();

        // return response()->json($todo);

    }

    public function update(Request $request,Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ]);

        $todo->update($data);
        return response()->json($data);
    }

    public function delete(Todo $todo) 
    {
        $todo->delete();
        return response()->json('Deleted');
    }
    
}
