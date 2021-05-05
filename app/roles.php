<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = "roles";
    public function user()
    {
        return $this->hasMany('App\User', 'idRole', 'id');
    }
}