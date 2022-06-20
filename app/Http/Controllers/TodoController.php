<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::all();
        return view('index') ->with('todos', $todos);;
    }

    public function create()
    {
        return view('create');
    }

    public function details(Todo $todo)
    {
        return view('details') ->with('todos', $todo);
    }

    public function edit(Todo $todo)
    {
        return view('edit') ->with('todos', $todo);
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }

    public function update(Todo $todo)
    {
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();
        
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');
    }

    public function store(){

        try{
            $this->validate(request(), [
                'name' => 'required|min:3|max:20',
                'description' => 'required|min:3|max:20',
            ]);
        }catch (validationException $e) {
            return redirect('/create')
                ->withErrors($e->errors(){
                    session()->flash('success', 'Todo not created successfully.')
                })
                ->withInput();
        }

        $todo = new Todo();
        $todo->name = request('name');
        $todo->description = request('description');
        $todo->save();

        session()->flash('success', 'Todo created successfully.');

        return redirect('/');
    }
}
