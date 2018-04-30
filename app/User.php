<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
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
        'email', 'password', 'first_name', 'last_name', 'address', 'birthday', 'phone', 'image', 'type', 'is_vertified', 'is_enabled',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin(){
      return $this->type == 'administrator';
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function webboards() {
      return $this->hasMany('App\Webboard');
    }
}
