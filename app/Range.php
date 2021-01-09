<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    protected $table = 'ranges';
    protected $fillable = ['nombre','duracion','fecha_inicio','fecha_fin','period_id',];

    public function periods(){
    	return $this->hasMany('App\Period');
    }
}
