<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Shares;
use App\User;
use Auth;
use Carbon;
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
	    $dt = Carbon::parse(Carbon::now());
	    //Shares
	    $shares = new Shares;
	    $last = array();
	    $providers = array('fb','tw','in','gp');
	    $s=1;
	    while($s<12) {
	        $started = $dt->copy();
	        //If first share was not in full hour
	        if(($dt->minute > 0)||(($dt->minute == 0)&&($dt->second > 0))) {
	            $dt->subMinutes($dt->minute);
	            $dt->subSeconds($dt->second);
	            foreach($providers as $provider) {
                    $last[$dt->hour][$provider] =  $shares
	                                    ->where('type', '=', $provider)
	                                    ->whereBetween('stated', [$dt, $started])
	                                    ->count();
	            }
	        } else {
	            $dt->subHour();
	            foreach($providers as $provider) {
	                $last[$dt->hour][$provider] =  $shares
	                                    ->where('type', '=', $provider)
	                                    ->whereBetween('stated', [$dt, $started])
	                                    ->count();	        
	            }
	        }
	        unset($started);
	        $s++;
	    }
        $o = 0;
        foreach(array_reverse($last,true) as $k=>$item) {
            $json['label'][] = $k;
            $json['values'][$o]['label'] = $k;
            foreach($item as $provider) {
                $json['values'][$o]['values'][] = $provider;
            }
            $o++;
        }
        $json['color'] = array("#4c4ca6", "#7ac675","#fff5a2", "#c0362c");
        $data = array(
            'gg' => json_encode($json),
            'total_shares' => $shares->count(),
            'current_time' => Carbon::now(),
            'fb_shares' => $shares->where('type', '=', 'fb')->count(),
            'tw_shares' => $shares->where('type', '=', 'tw')->count(),
            'ln_shares' => $shares->where('type', '=', 'in')->count(),
            'gp_shares' => $shares->where('type', '=', 'gp')->count()
        );
		return View::make('admin.home', $data);
	}
}
