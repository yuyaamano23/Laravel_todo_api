<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;

class CreateTaskAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateTaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->validated()['name']; // バリデーションを行った値のみ取得
        $task->save(); // tasks テーブルに保存

        return response()->json(['id' => $task->id, 'name' => $task->name], 201);
    }
}
