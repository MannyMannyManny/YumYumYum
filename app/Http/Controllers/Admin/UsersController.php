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
	
	
}
