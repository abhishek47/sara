<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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



    public function index()
    {
    	return view('auth.profile');
    }

     public function notifications($count = 0)
     {
        if($count == 0)
        {
         return auth()->user()->notifications;   
        } else
        {
            return auth()->user()->notifications()->limit($count)->get();;  
        }
     }
}
