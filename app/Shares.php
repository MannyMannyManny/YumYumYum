<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    protected $table = 'shares';
    //We dont need timestamps, we have only one for shares
    public $timestamps = false;

}
