<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['nombre','duracion','año','descripcion',];

    public function courses(){
    	return $this->hasMany('App\Course');
    }
    
}
