@extends('layouts.app')



@section('content')

	
<div class="container py-4">

	

	<div class="card card-default box-shadow mb-3">
	<div class="card-body">
		<h3 class="py-2 font-weight-bold">{{ $project->title }}</h3>
		<div class="progress my-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100">{{$project->progress}}%</div>
                    </div>
                   </div> 
	</div>

	<div class="card card-default box-shadow">
		<div class="card-body">

			<div class="d-flex">
				<img src="http://via.placeholder.com/100x100" class="img-circle" style="width: 60px;height: 60px;border-radius: 100%;">

				<div style="flex: 3" class="mt-2 ml-3">

			
					<h5 class="font-weight-bold m-b-0">{{ $member->user->name }}</h5>
					<p class="text-muted m-t-0">{{ $member->role }}</p>
					
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-3">
		 <div class="col-sm-8">
			<div class="card card-default box-shadow mt-2">
				<div class="card-body">
				@if($project->user_id != auth()->id())
					<div class="d-flex">
						<img src="http://via.placeholder.com/100x100" class="img-circle" style="width: 50px;height: 50px;border-radius: 100%;">

						<div style="flex: 3" class="mt-1 ml-3">

					
							<h5 class="font-weight-bold m-b-0" style="font-size: 13px;">{{ $project->user->name }}</h5>
							<p class="text-muted m-t-0" style="font-size: 12px;">Project Owner</p>
							
						</div>
					</div>

					<h6 class="my-2"><b>Description</b></h6>
					
					
					@endif
					{{ $project->description }}
				</div>
			</div>
		</div>	

		<div class="col-sm-4">
			<div class="card card-default box-shadow mt-2">
				<div class="card-body">
					<p><span class="font-weight-bold">Starts on :</span> {{ $project->start_date }}</p>
					<p><span class="font-weight-bold">Deadline :</span> {{ $project->end_date }}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-3">
		

		<div class="col-sm-8">
			<h4 class="py-3 font-weight-bold float-left">My Tasks</h4>

			<a href="#newTask" data-toggle="modal" class="btn btn-primary btn-sm float-right mt-3"><i class="far fa-plus-square"></i> New Task</a>

			         <div class="clearfix"></div>   

				<div class="card card-default box-shadow">
					<div class="card-body">

					@if(auth()->id() != $project->user_id)
						
	                 	<div class="progress my-1 mb-4">
	                      <div class="progress-bar bg-success" role="progressbar" style="width: {{$member->progress}}%;" 
	                      aria-valuenow="{{$member->progress}}" aria-valuemin="0" aria-valuemax="100">{{$member->progress}}%</div>
	                    </div>

			         @endif           
					

					    @foreach($tasks as $task)
						 	<div class="task-item {{ isset($task->dependentTask) ? ( $task->dependentTask->completed ? '' : 'disabled') : '' }}">
								<div class="d-flex text-dark align-items-center">
									@if($task->completed)
										<a href="/tasks/{{$task->id}}/toggle" class="task-item-check" > <i class="fa fa-check"></i> </a>		
									@else
										<a href="/tasks/{{$task->id}}/toggle" class="task-item-check"></a>
									@endif
									<div style="flex: 3;height: 58px;" class="ml-3">
										<a href="/projects/{{$project->id}}/tasks/{{$task->id}}">
										@if($task->completed)
											<h6 class="font-weight-medium mb-0"><del>{{ $task->title }}</del></h6>
										@else
											<h6 class="font-weight-medium mb-0">{{ $task->title }} <small >	
											
											 <a href="/tasks/{{$task->id}}/remove" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp; 
											</small></h6>	
										@endif
										</a>	
										<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned By :</span> <span class="text-info">{{ $task->head->name }}</span> 

												
										</p>

										<small class="text-muted m-t-0">Deadline : {{ $task->deadline}}</small> 
										@if($task->depends_id != 0 && $task->depends_id != NULL)
										 | <small class="text-muted m-t-0"> <b>Depends on : <a href="/projects/{{$project->id}}/tasks/{{$task->dependentTask->id}}">{{ $task->dependentTask->title }}</a></b></small>
										@endif	
										
										
									</div>
								</div>
							</div>
						@endforeach
						


						<div class="more-button-container">
						 	<a href="/projects/{{ $project->id }}/members/{{ auth()->id() }}/tasks" class="btn btn-info">View All</a>
						</div>
					</div>
				</div>
		</div>

		<div class="col-sm-4">
			<h4 class="py-3 font-weight-bold float-left">My Team</h4>

			<a href="#newMember" data-toggle="modal" class="btn btn-success btn-sm float-right mt-3"><i class="far fa-plus-square"></i> New Member</a>


		     <div class="clearfix"></div>   

			<div class="card card-default box-shadow">
				<div class="card-body">

				@foreach($project->members as $member)
					  <div class="member-item">
						<div href="#" class="d-flex text-dark">
							<img src="http://via.placeholder.com/100x100" class="img-circle mt-2" style="width: 60px;height: 60px;border-radius: 100%;">

							<div style="flex: 3" class="mt-2 ml-3">
								<h5 class="font-weight-medium ">{{ $member->user->name }} ( {{ $project->tasks()->where('member_id', $member->user->id)->where('completed', 0)->count() }} )</h5>

								<p class="text-muted mb-1">{{ $member->user->email }}</p>
			                   
								<p class="text-muted mb-0">{{ $member->role }}</p>

								<div class="progress my-1 mb-2">
			                      <div class="progress-bar bg-success" role="progressbar" style="width: {{$member->progress}}%;" aria-valuenow="{{$member->progress}}" aria-valuemin="0" aria-valuemax="100">{{$member->progress}}%</div>
			                    </div>

								<p class="mt-0">
									<a href="/projects/{{ $project->id }}/members/{{ $member->user->id }}/tasks"  class="btn btn-sm btn-outline-warning">View Tasks</a> &nbsp;
									<!-- <a href="#" class="btn btn-sm btn-outline-primary">Chat</a> &nbsp; -->
									<a href="/members/{{$member->id}}/remove" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
								</p>
							</div>
						</div>
					 </div>	


				@endforeach	 

					 


					<!-- <div class="more-button-container">
					 	<a href="#" class="btn btn-info">View All</a>
					 </div> -->
				</div>
			</div>
		</div>
	</div>		
</div>


<!-- Modal -->
<div class="modal fade" id="newMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/projects/{{$project->id}}/members">
      	 {{ csrf_field() }}
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="font-weight-bold">Member E-mail Id</label>
	        	<input type="email" required="" name="member_email" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label class="font-weight-bold">Member Role</label>
	        	<input type="text" required="" name="member_role" class="form-control">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add Member</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/projects/{{$project->id}}/tasks">
      		{{ csrf_field() }}
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="font-weight-bold">Member</label>
	        	<select class="form-control" name="member_id">
	        		<option value="{{ auth()->user()->id }}">Assign to self</option>
	        		@foreach($project->members as $member)
	        				<option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
	        		@endforeach
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label class="font-weight-bold">Task Title</label>
	        	<input type="text" name="title" required="" class="form-control">
	        </div>

	        <div class="form-group">
	        	<label class="font-weight-bold">Task Description</label>
	        	<textarea name="description" required="" class="form-control"></textarea>
	        </div>

	         <div class="form-group">
	        	<label class="font-weight-bold">Task Deadline</label>
	        	<input type="date" name="deadline" required="" class="form-control">
	        </div>

	         <div class="form-group">
	        	<label class="font-weight-bold">Depends on </label>
	        	<select class="form-control" name="depends_id">
	        		<option value="0">-- None --</option>
	        		@foreach($project->tasks as $task) 
		        		<option value="{{ $task->id }}">{{ $task->title }}</option>
	        		@endforeach
	        	</select>
	        </div>

	    <!--    <div class="form-group">
	        	<label class="font-weight-bold">Additional File</label>
	        	<input type="file" name="file" class="form-control">
	        </div> -->

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add Task</button>
	      </div>
      </form>
    </div>
  </div>
</div>


@endsection


@section('js')

	<script type="text/javascript">
		$('#start_date').dateDropper();
		$('#end_date').dateDropper();
	</script>


@endsection