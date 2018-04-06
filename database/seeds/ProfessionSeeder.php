<?php

use App\Models\Profession ;//+importando la clase.. puedo darle un alias, en este caso le di Profesion (en español...) entonces cuando vaya a hacer referencia a la clase mas abajo, tengo que poner 
//App\profesion (el alias)... aunque esto no es necesario...
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//CON SQL PLANO
    	//DB::insert('INSERT INTO professions (title) values (:title)', ['title'=>'programador backend']);

    	//CON EL CONSTRUCTOR DE CONSULTAS DE LARAVEL
        // DB::table('professions')->insert([
        // 	"title"=>'Backend developer',
        // ]);

        //CON ELOQUENT
        \App\Models\Profession::create([//Puedo usar la clase Profession que hice con php artisan:make model Profession, y usar su metodo create, ya que esta clase EXTIENDE de model... y model si tiene ese metodo.. 
        	'title'=>'Cantante',
        ]);

        \App\Models\Profession::create([//Puedo usar la clase Profession que hice con php artisan:make model Profession, y usar su metodo create, ya que esta clase EXTIENDE de model... y model si tiene ese metodo.. 
        	'title'=>'Desarrollador back end',
        ]);
        //CON EL CONSTRUCTOR DE CONSULTAS DE LARAVEL
        factory(Profession::class)->times(17)->create();//crea 17 profesiones


    }
}
