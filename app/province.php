<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table = "province";
    public $timestamps = false;
    public function post()
    {
        return $this->hasMany('App\post', 'province_id', 'id');
    }
}
