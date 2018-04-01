<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    	
    protected $guarded = [];

	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function head()
    {
    	return $this->belongsTo(User::class, 'assigner_id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }


    public function tasks()
    {
        return $this->hasMany(Task::class, 'member_id')->where('project_id', $this->project_id);
    }

	  

    public function getProgressAttribute()
    {
    	$my = $this->project->tasks()->where('member_id', $this->user->id)->count();

    	$assigned =  $this->project->tasks()->where('assigner_id', $this->user->id)->count();

    	$myCompleted =  $this->project->tasks()->where('member_id', $this->user->id)->where('completed', 1)->count();

    	$assignedCompleted =  $this->project->tasks()->where('assigner_id', $this->user->id)->where('completed', 1)->count();

    	return ceil((($myCompleted + $assignedCompleted) /  ($my + $assigned)) * 100);
    }


}
