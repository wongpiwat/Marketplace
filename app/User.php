<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; // เป็น date
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'password','last_name','birthday','is_enabled','phone','image','address','type'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    

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
