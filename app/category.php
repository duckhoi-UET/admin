<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    public $timestamps = false;
    public function post()
    {
        return $this->hasMany('App\post', 'category_id', 'id');
    }
}
