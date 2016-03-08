<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use Input;
use Hash;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
	    $users = User::all();
		return View::make('admin.users.list', ['users' => $users]);
	}
	
	public function create()
	{
	    return View::make('admin.users.create');
	}
	
	public function edit($uid)
	{
	    $users = User::find($uid);
		return View::make('admin.users.edit', [ 'user' => $users ]);
	}
	
    public function update($uid)
    {
        $user = User::find($uid);
        if((!empty(Input::get('name')))&&(!empty(Input::get('email')))) {
		    $user->name = Input::get('name');
		    $user->email = Input::get('email');
	        if((!empty(Input::get('password')))&&(Input::get('password')==Input::get('password_confirmation'))) {
		        $user->password = Hash::make(Input::get('password'));
	        } else if((!empty(Input::get('password')))&&(Input::get('password')!=Input::get('password_confirmation'))) {
	            return Redirect::back()
		    	    ->withInput()
		    	    ->withErrors('Entered password didnt match confirmation');
            }
            $user->save();
		    return Redirect::to('/admin/users');
        } else {
 	        return Redirect::back()
			    ->withInput()
			    ->withErrors('Empty username or email :C');           
        }
	}
	
	public function store()
	{
	    if((!empty(Input::get('name')))&&(!empty(Input::get('email')))&&(!empty(Input::get('password')))&&(!empty(Input::get('password_confirmation')))) {
	        if(Input::get('password')==Input::get('password_confirmation')) {
		        $user = new User;
		        $user->username = Input::get('username');
		        $user->name = Input::get('name');
                $user->email = Input::get('email');
		        $user->password = Hash::make(Input::get('password'));
		        $user->save();
		        return Redirect::to('/admin/users');
	        } else {
 	            return Redirect::back()
			        ->withInput()
			        ->withErrors('Entered password didnt match confirmation');	            
	        }
        } else {
 	        return Redirect::back()
			    ->withInput()
			    ->withErrors('Empty username, email, password or its confirmation :D');           
        }
	}
	
	public function destroy($uid)
	{
		User::destroy($uid);
		return Redirect::to('/admin/users');
	}
}
