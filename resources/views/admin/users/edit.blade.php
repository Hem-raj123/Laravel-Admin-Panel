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
      <form method="post" action="{{ route('updateuser',$user)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
        	<label for="name">UserName:</label>
        	<input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
        </div>
        <div class="form-group">
        	<label for="email">Email:</label>
        	<input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
        </div>      
        <div class="form-field">
        	<label for="role">Role</label>
        	<div class="role">
        		<select name="role" id="role">
                    <option value="user" @if($user->user=='user') selected @endif>User</option>
                    <option value="admin" @if($user->user=='admin') selected @endif>Admin</option>
                </select>
        	</div>
        </div>     
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection