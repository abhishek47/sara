<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function members()
    {
    	return $this->hasMany(ProjectUser::class, 'project_id')->where('assigner_id', auth()->id());
    }


    public function tasks()
    {
    	return $this->hasMany(Task::class, 'project_id');
    }

    public function getProgressAttribute()
    {
    	if($this->tasks()->count() == 0)
    	{
    		return 0;
    	}	
    	
    	return ceil(($this->tasks()->where('completed', 1)->count()/$this->tasks()->count()) * 100);  
    }


    public function getMember($id)
    {
    	return ProjectUser::where('project_id', $this->id)->where('user_id', $id)->first();
    }

}
