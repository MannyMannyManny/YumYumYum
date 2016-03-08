<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use Input;
use Hash;
use Redirect;
use Illuminate\Support\Facades\Validator;
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
        $validate = array(
            'name'             => 'required',
            'email'            => 'required|email'
        );
        if(!empty(Input::get('password'))) {
            $validate['password'] = 'required';   
            $validate['password_confirmation'] = 'required|same:password';  
        }
        $validator = Validator::make(Input::all(), $validate);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $user = User::find($uid);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		if(!empty(Input::get('password'))) {
            $user->password = Hash::make(Input::get('password'));
        }
        $user->save();
        return Redirect::to('/admin/users');
	}
	
	public function store()
	{
        $validate = array(
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'username'            => 'required|unique:users',
            'password'         => 'required',
            'password_confirmation' => 'required|same:password'
        );

        $validator = Validator::make(Input::all(), $validate);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }    
		$user = new User;
		$user->username = Input::get('username');
		$user->name = Input::get('name');
        $user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return Redirect::to('/admin/users');
	}
	
	public function destroy($uid)
	{
	    if(User::count() > 1) {
		    User::destroy($uid);
		    return Redirect::to('/admin/users');
	    } else {
		   return Redirect::back()
                ->withInput()
                ->withErrors('You cant delete all admins :C');        
	    }
	}
}
