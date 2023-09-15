<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $filters = $request->all();
        // Remove the 'user_id' from filters if it's being added
        // unset($filters['user_id']);

        $tasks = $this->taskService->getAllTasks($filters);
        return view('tasks.index', ['tasks' => $tasks]);
    }


    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('tasks.form');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $taskData = $request->all();
        $this->taskService->createTask(array_merge($taskData, ['user_id' => Auth::id()]));
        return redirect()->route('tasks.index');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.form', ['task' => $task]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $taskData = $request->all();
        $this->taskService->updateTask($id, $taskData);
        return redirect()->route('tasks.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index');
    }

    public function markAsDone($id): \Illuminate\Http\RedirectResponse
    {
        $this->taskService->markAsDone($id);
        return redirect()->route('tasks.index');
    }
}
