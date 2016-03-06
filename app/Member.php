<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }
}
