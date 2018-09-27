@extends('layouts.backend')
@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('admin/users') }}">Back</a>
            </div>
        </div>
    </div> 
    <div class="container">    
      <form method="post" action="{{ route('createuser')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="form-group">
        	<label for="name">UserName:</label>
        	<input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
        	<label for="email">Email:</label>
        	<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
         <div class="form-group">
        	<label for="pwd">Password:</label>
        	<input type="Password" class="form-control" id="Password" placeholder="Enter Password" name="password">
        </div>
        <div class="form-field">
        	<label for="role">Role</label>
        	<div class="role">
        		<select name="role" id="role">
        		  <option selected="selected" value="user">User</option>      	
        		  <option value="admin">Admin</option>
        		</select>
        	</div>
        </div>     
        <button type="submit" class="btn btn-default">Submit</button>        
      </form>
    </div>
@endsection