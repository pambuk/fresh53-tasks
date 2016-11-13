<?php
namespace App\Fresh;

use App\Task;
use App\User;

class TasksService
{
    public function getAllForUser(User $user)
    {
        return $user->tasks();
    }

    public function add($data, User $user)
    {
        $task = Task::create($data);
        $user->tasks()->save($task);

        return $task;
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