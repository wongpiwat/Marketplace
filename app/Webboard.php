<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webboard extends Model
{
    protected $fillable = ['market_id', 'topic', 'details','created_by'];

}
