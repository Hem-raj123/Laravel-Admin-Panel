@extends('layouts.backend')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
 @if ( Session::has('message') )
    <div class="alert alert-success fade-message">
         <p>{{ Session::get('message') }}</p>
    </div>
@endif 
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
      <h2>User</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ url('admin/users/create') }}">Add New User</a>
      </div>   
      </div>           
    </div>     
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover ">
          <thead class="bg-light ">
            <tr>
              <th>
                <div class="form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="">
                  </label>
                </div>
              </th>  
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>            
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $index =>$user)
            <tr>
              <td>
                {{ $index + $users->firstItem() }}
              </td>                                   	
              <td><a href="#"><small>{{ $user->name }}</small></a></td>                                   
              <td><small>{{ $user->email }}</small></td>
              <td><small>{{ $user->role }}</small></td>              
              <td>
                   <a href="{{ route('users.edit', $user->id) }}" class="label label-warning"><i class="fa fa-pencil-square-o"></i></a>
                   <form action=" {{url('admin/users/destroy', [$user->id])}}" method="post" style="display:inline;">
                    {{csrf_field()}}
                       <input name="_method" type="hidden" value="DELETE">
                       <button class="permanentDelLink" type="submit" style="display:inline;border: none;background: none;color: red; cursor: pointer;"><i class="fa fa-trash"></i></button>
                  </form>                         
              </td>                               
            </tr> 
            @endforeach                           
          </tbody>
        </table>
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
@endsection

