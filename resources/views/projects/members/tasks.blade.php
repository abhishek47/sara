@extends('layouts.app')



@section('content')

	
<div class="container py-4">

	<h3 class="py-3 font-weight-bold"><a class="text-dark" href="/projects/{{ $project->id}}"><i class="fa fa-arrow-left"></i></a> {{ $project->title }}</h3>

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
		

		

		<div class="col-sm-12">
			<h4 class="py-3 font-weight-bold float-left">{{ auth()->id() == $member->user->id ? 'My '  : $member->user->name . ' \'s'  }} Tasks</h4>

			<a href="#newTask" data-toggle="modal" class="btn btn-primary btn-sm float-right mt-3"><i class="far fa-plus-square"></i> New Task</a>

			         <div class="clearfix"></div>   

				<div class="card card-default box-shadow">
					<div class="card-body">

						@foreach($tasks as $task)
							<div class="task-item {{ isset($task->dependentTask) ? ( $task->dependentTask->completed ? '' : 'disabled') : '' }}">
								<div class="d-flex text-dark align-items-center">
									@if($task->member_id == auth()->id())

										@if($task->completed)
											<a href="/tasks/{{$task->id}}/toggle" class="task-item-check" > <i class="fa fa-check"></i> </a>		
										@else
											<a href="/tasks/{{$task->id}}/toggle" class="task-item-check"></a>
										@endif

										

									@else
										@if($task->completed)
											<div class="task-item-check" > <i class="fa fa-check"></i> </div>		
										@else
											<div href="/tasks/{{$task->id}}/toggle" class="task-item-check"></div>
										@endif

										

									@endif
									<div style="flex: 3;height: 58px;" class="ml-3">
										@if($task->completed)
											<h6 class="font-weight-medium mb-0"><del>{{ $task->title }}</del></h6>	
										@else
											<h6 class="font-weight-medium mb-0">{{ $task->title }} <small >	
											
											 <a href="/tasks/{{$task->id}}/remove" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp; 
											</small></h6>	
										@endif

										<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">{{ $task->member->name }}</span> 

												
										</p>

										<small class="text-muted m-t-0">Deadline : {{ $task->deadline}}</small> 
										@if($task->depends_id != 0 && $task->depends_id != NULL)
										 | <small class="text-muted m-t-0"> <b>Depends on : <a href="#">{{ $task->dependentTask->title }}</a></b></small>
										@endif	
										
										
									</div>
								</div>
							</div>
						@endforeach

						

						
					</div>
				</div>
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
	        	<input type="hidden" name="member_id" value="{{ $member->user->id }}">
	        	
	        
	        <div class="form-group">
	        	<label class="font-weight-bold">Task Title</label>
	        	<input type="text" name="title" class="form-control">
	        </div>

	        <div class="form-group">
	        	<label class="font-weight-bold">Task Description</label>
	        	<textarea name="description" class="form-control"></textarea>
	        </div>

	         <div class="form-group">
	        	<label class="font-weight-bold">Task Deadline</label>
	        	<input type="date" name="deadline" class="form-control">
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