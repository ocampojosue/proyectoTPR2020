<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','description','period_id',];

    public function periods(){
    	return $this->hasMany('App\Period');
    }

    public function students(){
    	return $this->hasMany('App\Student');
    }
    public function grades(){
        return $this->hasMany('App\Grade');
    }
}
