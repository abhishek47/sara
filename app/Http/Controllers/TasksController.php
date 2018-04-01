<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Project $project, User $user)
    {
        $tasks = $project->tasks()->where('member_id', $user->id)->get();

        if($project->user_id == $user->id)
        {
            $member = new ProjectUser;

            $member->user_id = $user->id;

            $member->role = 'Project Owner';
        } else {
            
            $member = ProjectUser::where('project_id', $project->id)->where('user_id', $user->id)->first();
        }

        return view('projects.members.tasks', compact('tasks', 'member', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $data = $request->all();

        $data['assigner_id'] = auth()->id();
        $data['project_id'] = $project->id;

        $project->tasks()->create($data);

        flashy()->success( 'You assigned a new task', '/project/' . $project->id);

        return back();
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        $task->delete();

        flashy()->success( 'The task was removed successfully!');

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function toggle(Task $task)
    {

        $task->completed = !$task->completed;

        $task->save();

        if($task->completed){
            flashy()->success( 'The task was completed!');
        } else {
             flashy()->info( 'The task was marked incompleted!');
        }

        return back();
    }
}
