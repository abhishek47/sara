@extends('layouts.app')


@section('content')

     <section class="jumbotron text-left">
        <div class="container">
         <div class="row">
          <div class="col-sm-7">
              <h1 class="jumbotron-heading">Simplified Project Management</h1>
              <p class="lead text-muted">Sara simplifies managing a project by dividing your project into a task and team hierarchy and let the team member focus only on his/her own details.</p>
              <p>
                <a href="/register" class="btn btn-primary my-2">Start Managing My Project</a>
               
              </p>
            </div>
            
            <div class="col-sm-5">
                
            </div>  
         </div> 
        </div>
      </section>


      <section class="py-4" id="features">
           <div class="container">
              <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Free</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>50 users included</li>
                      <li>2 GB of storage</li>
                      <li>Email support</li>
                      <li>Help center access</li>
                    </ul>
                    <a href="/register"  class="btn btn-lg btn-block btn-outline-primary">Sign up for free</a>
                  </div>
                </div>
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>100 users included</li>
                      <li>10 GB of storage</li>
                      <li>Priority email support</li>
                      <li>Help center access</li>
                    </ul>
                    <a href="/register"  class="btn btn-lg btn-block btn-primary">Get started</a>
                  </div>
                </div>
                <div class="card mb-4 box-shadow">
                  <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise</h4>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                      <li>100+ users included</li>
                      <li>15 GB of storage</li>
                      <li>Phone and email support</li>
                      <li>Help center access</li>
                    </ul>
                    <a href="/register"  class="btn btn-lg btn-block btn-primary">Contact us</a>
                  </div>
                </div>
            </div>
      </section>


@endsection