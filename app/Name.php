<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    // protected $fillable = [
    //     'name', 'sername', 'created_at'
    // ];

    public function category()
    {
     	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
