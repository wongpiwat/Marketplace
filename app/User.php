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
<<<<<<< HEAD
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
    
=======
    protected $fillable = ['username', 'first_name', 'last_name','password','email','address','birthday','phone','image','type','is_enabled'];
    protected $hidden = ['password', 'remember_token'];

    // public function categories() {
    //   return $this->hasMany('App\Category','assign_to');
    // }
    //
    // public function scopeAdmin($query) {
    //   return $query->where('access_level','administrator');
    // }
    //
    // public function scopeViewer($query) {
    //   return $query->where('access_level','viewer');
    // }
    //
    // public function scopeOfLevel($query,$level) {
    //   return $query->where('access_level','viewer');
    // }
>>>>>>> fe16a7011818d0e5e149b49b8a885ecba64bd123
}
