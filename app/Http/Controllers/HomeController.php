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
        $fb_shares = Shares::where('type', '=', 'fb')->count();
        $tw_shares = Shares::where('type', '=', 'tw')->count();
        $ln_shares = Shares::where('type', '=', 'ln')->count();
        $gp_shares = Shares::where('type', '=', 'gp')->count();
        return View::make('index', array("fb" => $fb_shares));
    }
}
