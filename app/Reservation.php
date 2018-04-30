<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    //
    use SoftDeletes;

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
        'zone_id', 'number', 'reserved_by', 'is_paid',
    ];

    public function zones() {
      return $this->belongsToMany('App\Zone', 'zone_id');
    }

    public function checkIns()
    {
        return $this->hasMany('App\CheckIn');
    }
}
