@extends('layouts.app')
@section('content')

<div class="container py-4">
	<h3 class="py-3 font-weight-bold"><a class="text-dark" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a> {{ $project->title }}</h3>
	<div class="card card-default box-shadow">
		<div class="card-body">
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
						<a href="/project/{{$project->id}}/tasks/{{$task->id}}">
							@if($task->completed)
							<h6 class="font-weight-medium mb-0"><del>{{ $task->title }}</del></h6>
							@else
							<h6 class="font-weight-medium mb-0">{{ $task->title }} <small >
							
							<a href="/tasks/{{$task->id}}/remove" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
							</small></h6>
							@endif
						</a>
						<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">{{ $task->member->name }}</span>
						
					</p>
					<small class="text-muted m-t-0">Deadline : {{ $task->deadline}}</small>
					@if($task->depends_id != 0 && $task->depends_id != NULL)
					| <small class="text-muted m-t-0"> <b>Depends on : <a href="#">{{ $task->dependentTask->title }}</a></b></small>
					@endif
					
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card card-default box-shadow mt-3">
		<div class="card-body">
			<h6><b>Description</b></h6>
			{{ $task->description }}
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