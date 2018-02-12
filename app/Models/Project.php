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
}
