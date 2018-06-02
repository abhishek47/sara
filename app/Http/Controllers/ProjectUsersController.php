<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Task;
use App\Models\ProjectUser;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Notifications\AddedToProject;

class ProjectUsersController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $user = User::where('email', $request->get('member_email'))->first();

        if($user)
        {
             ProjectUser::create([ 'project_id' => $project->id, 'user_id' => $user->id, 'assigner_id' => auth()->id(), 'role' => $request->get('member_role') ]);

             $user->notify(new AddedToProject($project));


             flashy()->success( $user->name . ' is added to project.', '/project/' . $project->id);
        } else {
            flashy()->error( $request->get('member_email') . ' is not a valid user.');
        }
       

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectUser $member)
    {   
        $user = $member->user;
        $project = $member->project;

        Task::where('member_id', $user->id)->delete();

        foreach ($member->team as $key => $teammember) {
            $teammember->delete();
        }

        $member->delete();

         flashy()->success( $user->name . ' is removed from project.', '/project/' . $project->id);

         return back();

    }
}
