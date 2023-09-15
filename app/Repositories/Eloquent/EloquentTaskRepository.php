<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks($filters): Collection
    {
        // Remove or comment out this line
        // return Task::where('user_id', $filters['user_id'])->get();

        // Just return all tasks
        return Task::all();
    }


    public function getTaskById($id)
    {
        return Task::find($id);
    }

    public function createTask(array $taskData)
    {
        return Task::create($taskData);
    }

    public function updateTask($id, array $taskData)
    {
        $task = Task::find($id);
        $task->update($taskData);
        return $task;
    }

    public function deleteTask($id)
    {
        return Task::destroy($id);
    }

    public function markAsDone($id)
    {
        $task = Task::find($id);
        $task->status = 'done';
        $task->completed_at = now();
        $task->save();
        return $task;
    }
}
