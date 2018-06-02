@extends('layouts.app')




<!-- Main Page Body -->
@section('content')

     <div class="container">
        <h2 class="pb-3 mt-5">Alerts &amp; Notifications</h2>

        <hr>

            
         <user-activity :count="0"></user-activity>
              


    </div>
    
@endsection


