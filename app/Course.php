<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','description','period_id',];

    public function periods(){
    	return $this->belongsTo('App\Period');
    }   
}
