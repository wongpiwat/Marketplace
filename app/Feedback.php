<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model {
  protected $fillable = ['topic','comment', 'created_by'];
  public $table = 'feedbacks';

  public function users()
  {
      return $this->belongsToMany('App\User');
  }
}
