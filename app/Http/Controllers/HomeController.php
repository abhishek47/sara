<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        $assignedProjects = auth()->user()->assignedProjects()->latest()->get();

        return view('home', compact('projects', 'assignedProjects'));
    }

    public function timeline()
    {
        return view('timeline');
    }

}
