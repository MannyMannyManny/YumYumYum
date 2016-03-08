<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display dashboard with social shares.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.home');
	}
}
