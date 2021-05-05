<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    protected $table = "notify";
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
