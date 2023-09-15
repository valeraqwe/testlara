<?php

namespace App\Services;

use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService
{
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks($filters): \Illuminate\Database\Eloquent\Collection
    {
        return $this->taskRepository->getAllTasks($filters);
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->getTaskById($id);
    }

    public function createTask($taskData)
    {
        return $this->taskRepository->createTask($taskData);
    }

    public function updateTask($id, $taskData)
    {
        return $this->taskRepository->updateTask($id, $taskData);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }

    public function markAsDone($id)
    {
        return $this->taskRepository->markAsDone($id);
    }
}
