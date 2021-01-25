<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','surname','sex','avatar'];
    
    public function courses(){
    	return $this->belongsTo('App\Course');
    }
    public function matters(){
        return $this->belongsToMany('App\Matter');
    }
}
