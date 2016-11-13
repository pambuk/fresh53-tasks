<?php
namespace App\Fresh;

use App\Task;
use App\User;

class TasksService
{
    public function getAllForUser(User $user)
    {
        return $user->tasks;
    }

    public function add($data, User $user)
    {
        $task = new Task();
        $task->fill($data);
        $user->tasks()->save($task);

        return $this->get($task->id);
    }

    public function get($id)
    {
        return Task::findOrFail($id);
    }

    public function delete($id)
    {
        return Task::destroy($id);
    }
}