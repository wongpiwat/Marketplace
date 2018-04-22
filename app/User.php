<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at']; // เป็น date
    protected $fillable = ['username', 'first_name','last_name', 'password','email','address','birthday','phone','image','type','is_enabled'];
    protected $hidden = ['password', 'remember_token'];

}
