<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * View ToDos listing.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $todoList = Todo::where('user_id', Auth::id())->paginate(7);

        return view('todo.list', compact('todoList'));
    }

    /**
     * View Create Form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $add=Todo::create([
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id,
        ]);
        if($add){
            return redirect('/todo')
                ->with('flash_notification.message', 'New todo created successfully')
                ->with('flash_notification.level', 'success');
        }else{
            return redirect('/todo')
            ->with('flash_notification.message', 'Fail to create new todo')
            ->with('flash_notification.level', 'danger');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);

        return view('todo.edit', compact('todo', 'id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->name = $request->get('name');
        if ($todo->save()) {
            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Todo updated successfully')
                ->with('flash_notification.level', 'success');
        } else {
            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Fail to update todo')
                ->with('flash_notification.level', 'danger');
        }
    }
    /**
     * Toggle Status.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->complete = !$todo->complete;
        if ($todo->save()) {

            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Todo updated successfully')
                ->with('flash_notification.level', 'success');
        } else {
            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Fail to update todo')
                ->with('flash_notification.level', 'danger');
        }
    }

    /**
     * Delete Todo.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        if ($todo->delete()) {

            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Todo deleted successfully')
                ->with('flash_notification.level', 'success');
        } else {
            return redirect()
                ->route('todo.index')
                ->with('flash_notification.message', 'Fail to delete todo')
                ->with('flash_notification.level', 'danger');
        }
    }
}
