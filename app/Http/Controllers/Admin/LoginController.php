<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use Input;
use Auth;
use Redirect;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getIndex()
	{
	    if(Auth::check())
	        return Redirect::intended('/admin/dashboard');
		return View::make('login.index');
	}

	public function postLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::attempt(['username' => $username, 'password' => $password]))
		{
			return Redirect::intended('/admin/dashboard');
		}

		return Redirect::back()
			->withInput()
			->withErrors('Wrong username or password :C');
	}

	public function getLogin()
	{
		return Redirect::to('/admin/dashboard');
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('/admin');
	}
}
