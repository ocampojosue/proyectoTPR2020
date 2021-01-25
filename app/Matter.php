<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    //Realacion muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Student');
    }
    public function teachers(){
        return $this->belongsToMany('App\Teacher');
    }
}
