<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    //We dont need timestamps, we have only one for shares
    public $timestamps = false;
}