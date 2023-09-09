<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('tasks', TaskController::class);
Route::get('/', function () {
    $tasks = Task::paginate(20);
    return view('index', ["tasks" => $tasks]);
});
Route::put("/tasks/{task}/toggle_complete", function (Task $task) {
    $task->is_completed = !$task->is_completed;
    $task->save();
    return redirect()->back()->withStatus("Updated Successfully!");
})->name("tasks.toggle_complete");

// Route::fallback(function () {
//     return redirect()->route("tasks.index");
// });