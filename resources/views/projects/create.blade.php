@extends('layouts.app')



@section('content')

	
<div class="container py-4">
	<h2 class="py-3">Create New Project</h2>

	<div class="card card-default box-shadow">
		<div class="card-body">
			<form method="POST" action="{{ route('project.store') }}">
			   {{ csrf_field() }}
				<div class="form-group">
					<label class="font-weight-bold">Project Title</label>
					<input type="text" name="title" class="form-control" required="" placeholder="Enter a descriptive project title">
				</div>

				<div class="form-group">
					<label class="font-weight-bold">Project Descrition</label>
					<textarea name="description" rows="3" class="form-control" required="" placeholder="Describe your project "></textarea>
				</div>

				<div class="form-group">
					<label class="font-weight-bold">Project Starts on</label>
					<input type="text" name="start_date" id="start_date" required="" data-large-default="true" data-large-mode="true" data-modal="true" class="form-control" >
				</div>

				<div class="form-group">
					<label class="font-weight-bold">Project Deadline</label>
					<input type="text" name="end_date" id="end_date" required="" data-large-default="true" data-large-mode="true" data-modal="true" class="form-control" >
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success">Create Project</button>
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