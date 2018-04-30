<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketImage extends Model
{
    //
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
        'market_id', 'path', 'type',
    ];

    public function markets() {
        return $this->belongsToMany('App\Market');
    }
}
