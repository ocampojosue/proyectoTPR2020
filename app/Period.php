<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $primaryKey='id';
    protected $table = "periods";
    public function period(){
        return $this->belongsTo('App\Period');
    }
}
