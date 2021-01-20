<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    //Restringir la vista de la pagina web solo a los usuarios con incio de sesion activa
    public function __construct(){
        $this->middleware('auth');
    }
}
