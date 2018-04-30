<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    //
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'start_day', 'close_day', 'start_time', 'close_time', 'organizer_name', 'contact_name', 'email', 'phone'
        , 'description', 'teaser', 'view', 'created_by', 'is_enabled', 'is_paid', 'latitude', 'longitude',
    ];

    public function zones() {
      return $this->hasMany('App\Zone');
    }

    public function marketImages() {
      return $this->hasMany('App\MarketImage');
    }

}
