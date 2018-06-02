<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use App\Notifications\NewTaskAssigned;

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
        $tasks = $project->tasks()->where('member_id', $user->id)->orderBy('deadline', 'ASC')->get();

        if($project->user_id == $user->id)
        {
            $member = new ProjectUser;

            $member->user_id = $user->id;

            $member->role = 'Project Owner';

            $member->project_id = $project->id;
        } else {
            
            $member = ProjectUser::where('project_id', $project->id)->where('user_id', $user->id)->first();
        }

        $team = ProjectUser::where('project_id', $project->id)->where('assigner_id', $user->id)->get();

        return view('projects.members.tasks', compact('tasks', 'member', 'project', 'team'));
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

        $user = User::findOrFail($data['member_id']);

        $data['assigner_id'] = auth()->id();
        $data['project_id'] = $project->id;

        $project->tasks()->create($data);

        flashy()->success( 'You assigned a new task', '/project/' . $project->id);

        $user->notify(new NewTaskAssigned($project));

        return back();
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Task $task)
    {   
        
        return view('tasks.show', compact('project', 'task'));
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
        foreach ($task->dependings as $key => $dtask) {
            $dtask->depends_id  = 0;
            $dtask->save();
        }
    

        $task->delete();

        flashy()->success( 'The task was removed successfully!');

        return redirect('projects/' . $task->project_id);
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
