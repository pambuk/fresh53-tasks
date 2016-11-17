<?php
namespace App\Http\Controllers;

use App\Fresh\TasksService;
use App\Http\Requests\TaskRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TasksService $tasks
     * @return \Illuminate\Http\Response
     */
    public function index(TasksService $tasks)
    {
        return response()->json(
            $tasks->getAllForUser(\Auth::user())
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest|Request $request
     * @param TasksService $tasks
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, TasksService $tasks)
    {
        $task = $tasks->add($request->all(), \Auth::user());
        return response()->json(['task' => $task,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param TasksService $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id, TasksService $tasks)
    {
        return response()->json(['task' => $tasks->get($id), ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param TasksService $tasks
     * @return Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Request $request, $id, TasksService $tasks)
    {
        $task = $tasks->update($id, $request->input('params.todo'));
        return response()->json(['task' => $task, ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param TasksService $tasks
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id, TasksService $tasks)
    {
        try {
            $task = $tasks->get($id);
            if ($task->user->id !== \Auth::user()->id) {
                throw new \Exception('Task belongs to someone else', Response::HTTP_FORBIDDEN);
            }

            $tasks->delete($id);
            $response = response()->json(['deleted' => $id,]);
        } catch (ModelNotFoundException $e) {
            $response = response()->json(['This task doesn\'t seem to exist any more'], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            $response = response()->json(['There seems to be a problem...'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $response;
    }
}
