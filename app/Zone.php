<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model {
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable = ['market_id', 'name', 'price'];

  public function markets() {
    return $this->belongsToMany('App\Market', 'market_id');
  }

  public function reservations() {
      return $this->hasMany('App\Reservation');
  }
  
}
