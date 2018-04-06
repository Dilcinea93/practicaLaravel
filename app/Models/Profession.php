<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profession extends Model
{
    //protected $table= 'my_professions'; le puedes especificar que tabla quieres usar, pero sino, laravel te la detecta con el nombre del modelo..
    //public $timestamps= false;
    protected $fillable= ['title']; //Al intentar crear una profesion con tinker me dio el siguiente error.
    /*
		Illuminate\Database\Eloquent\MassAssignmentException with message 'title' (error de carga masiva).. esto lo hace laravel para proteger que por ejemplo los usuarios no puedan meter mas datos de los que deberian.. supongo que esto rotege de las inyecciones sql... 
		ya que de alguna forma el usuario podria enviar no solo el campo title (en este caso..) sino otro que no vaya y eso es malo... (el usuario los envia como array asociativo)

		para eso se crea esta propiedad $fillable con un aray asociativo que dice cuales campos pueden llenarse con un array asociativo. de esa forma se elimina el error de carga masiva.

	El modelo de usuarios ya traia eso por defecto, por eso es que no me salio el error..
    */
    public function users(){
    	return $this->hasMany(User::class);
    }
}
