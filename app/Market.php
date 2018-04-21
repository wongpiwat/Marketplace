<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Market as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    protected $fillable = ['name', 'location', 'start_time','close_time','day','details','teaser','created_by','organizer_name','contact_name','email','phone'];

}
