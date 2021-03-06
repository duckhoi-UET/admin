<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function comment()
    {
        return $this->hasMany('App\comment', 'user_id', 'id');
    }
    public function post()
    {
        return $this->hasMany('App\post', 'idOwner', 'id');
    }
    public function report()
    {
        return $this->hasMany('App\report', 'idUser', 'id');
    }
    public function favorite()
    {
        return $this->hasMany('App\favorite','user_id', 'id');
    }
    public function role()
    {
        return $this->belongsTo('App\roles', 'idRole', 'id');
    }
    public function notify()
    {
        return $this->hasMany('App\notify', 'user_id','id');
    }
}
