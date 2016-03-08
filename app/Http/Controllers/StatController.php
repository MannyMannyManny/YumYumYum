<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use Response;
use Input;
use App\Quotation;
use App\Shares;
use App\Http\Requests;

class StatController extends Controller
{
    public function saveStats ()
    {
        if (Input::has('type')) {
            $date = Carbon::now();
            $share = new Shares;
            $share->type = Input::get('type');
            $share->stated = $date;
            $share->save();
            $count_shares = Shares::where('type', '=', Input::get('type'))->count();
            $response = array(
                'status' => 'OK',
                'count' => $count_shares
            );
        } else {
            $response = array(
                'status' => 'ERROR'
            );
        }
        return Response::json( $response );
    }
}
