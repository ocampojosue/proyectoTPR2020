<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','lastname','address','matter' ,'city' ,'phone' ,'sex' ,'avatar'];
    //Relacion muchos a muchos
    public function matters(){
        return $this->belongsToMany('App\Matter');
    }
}
