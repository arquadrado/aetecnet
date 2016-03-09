<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

    public function images()
    {
        return $this->hasMany('App\ProjectImage');
    }
}