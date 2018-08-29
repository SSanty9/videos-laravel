<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    //Relation 1->Many
    public function comments(){
    	return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    //Relation Many->1
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
