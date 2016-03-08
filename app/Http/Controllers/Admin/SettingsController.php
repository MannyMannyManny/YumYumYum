<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Input;
use Auth;
use Redirect;
use App\Settings;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
	    $settings = new Settings;
	    $data['fbapi'] = $settings->where('key', 'facebookid')->first();
        return View::make('admin.settings', $data);   
	}
	
	public function saveSetting()
	{
        $validate = array(
            'fbkey'             => 'required',
        );

        $validator = Validator::make(Input::all(), $validate);

        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $settings = new Settings;
        $settings->where('key', 'facebookid')
                ->update(['value' => Input::get('fbkey')]);
        return Redirect::to('/admin/settings');	    
	}
}
