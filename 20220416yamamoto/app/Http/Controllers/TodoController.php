<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view('index', compact('items'));
    }

    
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    
    public function update(TodoRequest $request)
    {
        Todo::find($request->id)->update(['content' => $request->content]);
        return redirect('/');
    }

    public function delete(TodoRequest $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
