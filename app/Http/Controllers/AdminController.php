<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{

	public function dashboard()
	{ 	 		
		return view('admin.dashboard');
	}

	public function users()
	{
		$users = User::paginate(10);     
		return view('admin.users.index', compact('users'));
	}

	public function create()
	{
		return view('admin.users.create');
	}

	public function store(Request $request)
	{
		request()->validate([
			'name' => 'required',
			'email' => 'required',        
			]);     
		User::create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),            
			'password' => bcrypt($request->input('password')),
			'role' => $request->input('role'),
			]);
		$request->session()->flash('message', 'Successfully Added The New User!');       
		return redirect('admin/users');
	}

	public function edit(User $user)
	{
		return view('admin.users.edit',compact('user'));
	}
	public function update(Request $request, User $user)
	{    
		request()->validate([
			'name' => 'required',
			'email' => 'required',            
			]);
		$user->update($request->all());
		$request->session()->flash('message', ' Updated Successfully!');
		return redirect('admin/users');
	}
	public function destroy(Request $request, User $user)
	{ 
		$user->delete();
		$request->session()->flash('message', 'deleted Successfully!');
		return redirect('admin/users');

	}
}
