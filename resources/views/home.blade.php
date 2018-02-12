@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-default box-shadow">
                    <div class="card-body">
                      <h4 class="m-0 p-0"><i class="fas fa-tasks text-danger"></i> &nbsp;  36 Tasks Pending</h4>
                      <p class="text-muted m-0 p-0 mt-2">&bull; 12 Reaching Deadline</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-default box-shadow">
                    <div class="card-body">
                      <h4 class="m-0 p-0"><i class="far fa-calendar-check text-primary"></i> &nbsp;  2 Tasks Completed</h4>
                      <p class="text-muted m-0 p-0 mt-2">&bull; 0 Deadlines Crossed</p>
                    </div>
                </div>
            </div>

             <div class="col-md-4">
                <div class="card card-default box-shadow">
                    <div class="card-body">
                      <h4 class="m-0 p-0"><i class="far fa-file-powerpoint text-info"></i> &nbsp;  3 Ongoing Projects</h4>
                      <p class="text-muted m-0 p-0 mt-2">&bull; 1 Reaching Deadline</p>
                    </div>
                </div>
            </div>

             
        </div>
    </div>



    <div class="container">
        <h2 class="py-3 float-left">My Projects</h2>

        <a href="{{ route('project.create') }}
        " class="btn btn-success float-right mt-3"><i class="far fa-plus-square"></i> New Project</a>
        
        <div class="clearfix"></div>
        <div class="row">
          @foreach($projects as $project)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <h5><a href="{{ '/projects/' . $project->id }}" class="text-dark">{{ $project->title }}</a></h5>
                    @if(auth()->user()->id == $project->user_id)
                        <span class="text-success font-weight-bold">&bull; Owned</span>
                    @else
                        <span class="text-warning font-weight-bold">&bull; Assigned</span>
                    @endif
                    <div class="progress mt-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">14%</div>
                    </div>
                  <p class="card-text pt-3">{{ substr($project->description, 0, 40) }}..</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ '/projects/' . $project->id }}" class="btn btn-sm btn-outline-secondary">Manage</a>
                      <a href="/project/12" class="btn btn-sm btn-outline-secondary">Leave</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
        @endforeach    
            
        </div>

    </div>


@endsection
