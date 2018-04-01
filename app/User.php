<?php

namespace App;

use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function assignedProjects()
    {
       
       return $this->hasMany(ProjectUser::class, 'user_id');
    
    }
}
