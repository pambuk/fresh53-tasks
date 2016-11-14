<?php declare(strict_types = 1);
namespace App\Fresh;

use App\Task;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class TasksService
{
    public function getAllForUser(User $user) : Collection
    {
        return $user->tasks;
    }

    public function add(array $data, User $user) : Task
    {
        $task = new Task();
        $task->fill($data);
        $user->tasks()->save($task);

        return $this->get($task->id);
    }

    /**
     * @param int $id
     * @return Task
     */
    public function get(int $id) : Task
    {
        return Task::findOrFail($id);
    }

    public function delete(int $id) : int
    {
        return Task::destroy($id);
    }
}