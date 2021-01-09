<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nombre','apellidos','direccion','email'];
    
    public function courses(){
    	return $this->belongsTo('App\Course');
    }
}
