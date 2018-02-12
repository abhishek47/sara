@extends('layouts.app')



@section('content')

	
<div class="container py-4">

	<h3 class="py-3 font-weight-bold">{{ $project->title }}</h3>

	<div class="card card-default box-shadow">
		<div class="card-body">
			<div class="d-flex">
				<img src="http://via.placeholder.com/100x100" class="img-circle" style="width: 60px;height: 60px;border-radius: 100%;">

				<div style="flex: 3" class="mt-2 ml-3">
					<h5 class="font-weight-bold m-b-0">{{ $project->user->name }}</h5>
					<p class="text-muted m-t-0">Project Owner</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-3">
		 <div class="col-sm-8">
			<div class="card card-default box-shadow mt-2">
				<div class="card-body">
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
			<h4 class="py-3 font-weight-bold float-left">Team Members</h4>

			<a href="#newMember" data-toggle="modal" class="btn btn-success btn-sm float-right mt-3"><i class="far fa-plus-square"></i> New Member</a>


		     <div class="clearfix"></div>   

			<div class="card card-default box-shadow">
				<div class="card-body">
					  <div class="member-item">
						<div href="#" class="d-flex text-dark">
							<img src="http://via.placeholder.com/100x100" class="img-circle mt-2" style="width: 60px;height: 60px;border-radius: 100%;">

							<div style="flex: 3" class="mt-2 ml-3">
								<h5 class="font-weight-medium ">Example Member 1</h5>
								<p class="text-muted">Graphic Designer</p>
								<p class="mt-0">
									<a href="#newTask" data-toggle="modal" class="btn btn-sm btn-outline-warning">Assign Task</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-primary">Chat</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
								</p>
							</div>
						</div>
					 </div>	
					 <div class="member-item">
						<div href="#" class="d-flex text-dark">
							<img src="http://via.placeholder.com/100x100" class="img-circle mt-2" style="width: 60px;height: 60px;border-radius: 100%;">

							<div style="flex: 3" class="mt-2 ml-3">
								<h5 class="font-weight-medium m-b-0">Example Member 2</h5>
								<p class="text-muted m-t-0">Front End Designer</p>
								<p class="mt-0">
									<a href="#newTask" data-toggle="modal" class="btn btn-sm btn-outline-warning">Assign Task</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-primary">Chat</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
								</p>
							</div>
						</div>
					 </div>	
					 <div class="member-item">
						<div href="#" class="d-flex text-dark">
							<img src="http://via.placeholder.com/100x100" class="img-circle mt-2" style="width: 60px;height: 60px;border-radius: 100%;">

							<div style="flex: 3" class="mt-2 ml-3">
								<h5 class="font-weight-medium m-b-0">Example Member 3</h5>
								<p class="text-muted m-t-0">Backend Developer</p>
								<p class="mt-0">
									<a href="#newTask" data-toggle="modal" class="btn btn-sm btn-outline-warning">Assign Task</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-primary">Chat</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
								</p>
							</div>
						</div>
					 </div>	
					 <div class="member-item">
						<div href="#" class="d-flex text-dark">
							<img src="http://via.placeholder.com/100x100" class="img-circle mt-2" style="width: 60px;height: 60px;border-radius: 100%;">

							<div style="flex: 3" class="mt-2 ml-3">
								<h5 class="font-weight-medium m-b-0">Example Member 3</h5>
								<p class="text-muted m-t-0">Tester</p>
								<p class="mt-0">
									<a href="#newTask" data-toggle="modal" class="btn btn-sm btn-outline-warning">Assign Task</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-primary">Chat</a> &nbsp;
									<a href="#" class="btn btn-sm btn-outline-danger">Remove</a> &nbsp;
								</p>
							</div>
						</div>
					 </div>


					 <div class="more-button-container">
					 	<a href="#" class="btn btn-info">View All</a>
					 </div>
				</div>
			</div>
		</div>

		

		<div class="col-sm-4">
			<h4 class="py-3 font-weight-bold float-left">Tasks</h4>

			<a href="#newTask" data-toggle="modal" class="btn btn-primary btn-sm float-right mt-3"><i class="far fa-plus-square"></i> New Task</a>

			         <div class="clearfix"></div>   

				<div class="card card-default box-shadow">
					<div class="card-body">
						<div class="task-item">
							<a href="#" class="d-flex text-dark align-items-center">
								<div class="task-item-check"></div>

								<div style="flex: 3;height: 58px;" class="ml-3">
									<h6 class="font-weight-medium mb-0">Create Graphic Assets</h6>
									<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">Example Member 1</span></p>
									<small class="text-muted m-t-0">Deadline : 13/02/2018</small>
								</div>
							</a>
						</div>

						<div class="task-item">
							<a href="#" class="d-flex text-dark align-items-center">
								<div class="task-item-check"></div>

								<div style="flex: 3;height: 58px;" class="ml-3">
									<h6 class="font-weight-medium mb-0">Design Web Prototype <i class="fas fa-link"></i></h6>
									<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">Example Member 2</span></p>
									<small class="text-muted m-t-0">Deadline : 17/02/2018</small>
								</div>
							</a>
						</div>

						<div class="task-item">
							<a href="#" class="d-flex text-dark align-items-center">
								<div class="task-item-check"></div>

								<div style="flex: 3;height: 58px;" class="ml-3">
									<h6 class="font-weight-medium mb-0">Develop Web Backend in PHP <i class="fas fa-link"></i></h6>
									<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">Example Member 3</span></p>
									<small class="text-muted m-t-0">Deadline : 27/02/2018</small>
								</div>
							</a>
						</div>

						<div class="task-item">
							<a href="#" class="d-flex text-dark align-items-center">
								<div class="task-item-check"></div>

								<div style="flex: 3;height: 58px;" class="ml-3">
									<h6 class="font-weight-medium mb-0">Test the complete website <i class="fas fa-link"></i></h6>
									<p class=" m-t-0 mb-0"><span class="font-weight-medium">Assigned to :</span> <span class="text-info">Example Member 4</span></p>
									<small class="text-muted m-t-0">Deadline : 03/03/2018</small>
								</div>
							</a>
						</div>


						<div class="more-button-container">
						 	<a href="#" class="btn btn-info">View All</a>
						</div>
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
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="font-weight-bold">Member E-mail Id</label>
	        	<input type="email" name="member_email" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label class="font-weight-bold">Member Role</label>
	        	<input type="text" name="member_role" class="form-control">
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
      <form method="POST" action="/projects/{{$project->id}}/task">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label class="font-weight-bold">Member</label>
	        	<select class="form-control">
	        		<option value="1">Assign to self</option>
	        		<option value="1">Example Member 1</option>
	        		<option value="2">Example Member 2</option>
	        		<option value="3">Example Member 3</option>
	        		<option value="4">Example Member 4</option>
	        	</select>
	        </div>
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
	        	<select class="form-control">
	        		<option value="1">Plan the wireframes of website</option>
	        		<option value="2">Create Graphic Assets</option>
	        	</select>
	        </div>

	        <div class="form-group">
	        	<label class="font-weight-bold">Additional Files</label>
	        	<input type="file" name="files" class="form-control">
	        </div>

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