<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function names()
    {
    	return $this->belongsToMany('App\Name');
    }
}
