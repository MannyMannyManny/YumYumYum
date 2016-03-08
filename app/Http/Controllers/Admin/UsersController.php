<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
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
	
	public function add()
	{
	    return View::make('admin.users.add');
	}
	
	public function edit($uid)
	{
	    $users = User::find($uid);
		return View::make('user.edit', [ 'user' => $users ]);
	}
	
    public function update($uid)
    {
        $user = User::find($uid);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return Redirect::to('/users');
	}
	
	public function store()
	{
		$user = new User;
		$user->username = Input::get('username');
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return Redirect::to('/users');
	}
}
