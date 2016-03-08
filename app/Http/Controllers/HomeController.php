<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Response;
use App\Shares;
use View;
use App\Quotation;
use App\Http\Requests;

class HomeController extends Controller
{
    public function indexPage ()
    {
        return View::make('index', array(
            "fb" => Shares::where('type', '=', 'fb')->count(), 
            "tw" => Shares::where('type', '=', 'tw')->count(),
            "ln" => Shares::where('type', '=', 'ln')->count(),
            "gp" => Shares::where('type', '=', 'gp')->count()
        ));
    }
}
