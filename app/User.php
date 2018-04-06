<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

//    protected $table= 'users';  Especifica el nombre de la tabla que este modelo va a usar (en caso de que el modelo no se llame igual que la tabla, pero como en este caso si se llama igual, tengo esta linea comentada ya que no es necesario especificaarle que tabla usar si una que tenga el mismpo nombre del modelo.)
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [   //el valor de estos campos no se va a mostrar cuando haga las consultas por consola con tinker.
        'remember_token',
    ];

    protected $casts = [            /*Esta propiedad la agrego porque cuando hago esto en el modelo $table->boolean('admin')->default(false);, laravel me va a crear ese campo pero de tipo tinyint... no se porque... entonces se hace esta propiedad con este array asociativo que dice que campos se van a convertir... en este caso quiero convertir el campo tinyint a boolean */
        'is_admin'=>'boolean'   
    ];

    public function isAdmin(){
        return $this->admin;
    }

    public static function findByEmail($email){
        return static::where(compact('email'))->first();

        //en la linea 35 la palabra static equivale a escribir User, porque al ser un metodo estatico
        /*
            (metodo en el que se hacen operaciones con los registros de la tabla.... segun el curso...
            yo lo que entendia por metodo estatico era que no era necesario instanciar un objeto de la clase para invocar a dicho metodo... y que los metodos que no eran estaticos se llamaban con un objeto de la clase)
            ...al ser un metodo estatico estara haciendo operaciones con registros de la tabla, en este caso seleccionar donde el email sea igual al enviado (no se.. es lo que entendi de la ckase de hoy) y como es estatico y estas en la clase USER, no es necesario escribir USER (ahh, mas o menos lo que ya pensaba de que los static no es necesario instanciar el modelo de la clase....) se puede escribir static... es lo mismo.. 
        */
    }
    public function profession(){
        return $this->belongsTo(Models\Profession::class);
    }
}
