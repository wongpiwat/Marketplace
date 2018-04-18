<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at']; // เป็น date
    protected $fillable = ['name', 'email', 'password','username','access_level','is_enabled'];
    protected $hidden = ['password', 'remember_token'];

    public function categories() {
      return $this->hasMany('App\Category','assign_to');
    }

    public function scopeAdmin($query) {
      return $query->where('access_level','administrator');
    }

    public function scopeViewer($query) {
      return $query->where('access_level','viewer');
    }

    public function scopeOfLevel($query,$level) {
      return $query->where('access_level','viewer');
    }
}
