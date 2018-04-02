<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['member_id', 'assigner_id', 'title', 'description', 'deadline', 'project_id', 'depends_id', 'file'];


    public function member()
    {
    	return $this->belongsTo(User::class, 'member_id');
    } 

    public function head()
    {
    	return $this->belongsTo(User::class, 'assigner_id');
    } 

    public function dependentTask()
    {
    	return $this->belongsTo(Task::class, 'depends_id');
    }

    public function dependings()
    {
    	return $this->hasMany(Task::class, 'depends_id');
    }
}
