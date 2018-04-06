<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeUserController extends Controller
{
	public function __invoke($name,$nickname=NULL){
		$name=ucfirst($name); //metodo para poner la primera letra de la cadena en mayuscula.
		if($nickname){
			return "Bienvenido {$name}, tu apodo es {$nickname}";
		}else{
			return "Bienvenido {$name}";
		}
	}
}
