<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Market as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    protected $fillable = ['name', 'location', 'start_time','close_time','date','details','teaser','created_by'];

}
