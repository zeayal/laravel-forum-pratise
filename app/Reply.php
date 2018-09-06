<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
