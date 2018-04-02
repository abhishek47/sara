<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
             'title' => 'required',
             'description' => 'required',
             'start_date' => 'required',
             'end_date' => 'required'
             ]);

        $project = auth()->user()->projects()->create(request()->all());

        flashy()->success('Your project is created successfully!', '/projects/' . $project->id);

        return redirect('/projects/' . $project->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = $project->tasks()->where('member_id', auth()->id())->get();


        if($project->user_id == auth()->id())
        {
            $member = new ProjectUser;

            $member->user_id = auth()->id();

            $member->role = 'Project Owner';

            $member->project_id = $project->id;
        } else {
            
            $member = ProjectUser::where('project_id', $project->id)->where('user_id', auth()->id())->first();
        }


        return view('projects.show', compact('project', 'tasks', 'member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        flashy()->success('Your project is deleted successfully!');

        return redirect('/home');
    }
}
