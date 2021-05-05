<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comments";
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function post()
    {
        return $this->belongsTo('App\post', 'post_id', 'id');
    }
}
