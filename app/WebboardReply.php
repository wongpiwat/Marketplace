<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebboardReply extends Model
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
        'comment', 'created_by', 'reply_by',
    ];

    public function users() {
      return $this->belongsToMany('App\User');
    }

    public function webboards() {
      return $this->belongsToMany('App\Webboard');
    }
}
