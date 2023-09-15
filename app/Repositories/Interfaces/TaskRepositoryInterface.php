<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getAllTasks($filters): Collection;

    public function getTaskById($id);

    public function createTask(array $taskData);

    public function updateTask($id, array $taskData);

    public function deleteTask($id);

    public function markAsDone($id);
}
