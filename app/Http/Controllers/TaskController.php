<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view("tasks.index", ["tasks" => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()
            ->route("tasks.show", ["task" => $task])
            ->withStatus("Now Task Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        return view("tasks.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        return view("tasks.edit", ["task" => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, task $task)
    {
        $task->update($request->validated());
        return redirect()
            ->route("tasks.show", ["task" => $task])
            ->withStatus("Task Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task->delete();
        return redirect()
            ->route("tasks.index")
            ->withStatus("Task Deleted Successfully!");
    }
}
