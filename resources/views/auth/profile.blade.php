@extends('layouts.app')



@section('content')



		
	<div class="container py-4">
		<h3 class="py-3">My Profile</h3>
		<div class="row">
		<div class="col-md-4">	
			<div class="card card-default box-shadow">
				<div class="card-body">
					<form method="post" class="text-dark" action="">
						{{ csrf_field() }}
						
						<img src="http://via.placeholder.com/100x100" class="img-responsive mb-2" style="margin: 0 auto;width: 100px;height: 100px;border-radius: 100%;">

						<div class="form-group"> 
							<label>Choose Profile Pic</label>
							<input type="file" readonly="" name="profile_pic" class="form-control">
						</div>

						<div class="form-group"> 
							
							<input type="submit" value="Update Profile Picture" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>	
		 </div>	
		 <div class="col-md-8">	
			<div class="card card-default box-shadow">
				<div class="card-body">
					<form method="post" class="text-dark" action="">
						{{ csrf_field() }}
						<div class="form-group"> 
							<label>Full Name</label>
							<input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
						</div>

						<div class="form-group"> 
							<label>E-mail Address</label>
							<input type="email" readonly="" name="email" value="{{ auth()->user()->email }}" class="form-control">
						</div>

						<div class="form-group"> 
							
							<input type="submit" value="Update Details" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>	
		 </div>	

		 
		</div>

	</div>	




@endsection