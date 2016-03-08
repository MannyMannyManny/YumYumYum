<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Response;
use App\Shares;
use App\Settings;
use View;
use App\Quotation;
use App\Http\Requests;

class HomeController extends Controller
{
    public function indexPage ()
    {
        $fbkey = Settings::where('key', 'facebookid')->first();
        return View::make('index', array(
            "fb" => Shares::where('type', '=', 'fb')->count(), 
            "fbapi" => $fbkey['value'],
            "tw" => Shares::where('type', '=', 'tw')->count(),
            "ln" => Shares::where('type', '=', 'ln')->count(),
            "gp" => Shares::where('type', '=', 'gp')->count()
        ));
    }
}
