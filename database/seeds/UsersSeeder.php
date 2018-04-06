<?php

use App\Models\Profession;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //consulta sin usar el constructor de consultas de laravel...
        //lo estoy haciendo manualmente.. 
        //$proffesions= DB::select('SELECT id from professions LIMIT 0,1');
//AQUI TAMBIEN VOY A SUSTITUIR POR EL ELOQUENT::
    	//$professions= DB::table('professions')->where(['title'=>'Cantante'])->first();

//Este es eloquent..-><-
    	
//Como funciona si no se ha definido el nombre de la tabla???
        //Laravel busca una tabla que tenga el mismo nombre del modelo.
 $professions=\App\Models\Profession::where(['title'=>'Cantante'])->first();
         /**

        dd($professions);
        una de las causas si no te funciona una consulta SQL, puede ser que haya un console.log, o un dd (como se le llama aqui....) por eso lo comente, porque esta consulta de abajo no me estaba funcionando
        */

        //VOY A HACER ESTA CONSULTA CON ELOQUENT----
        // DB::table('users')->insert([
        // 	'name'=>'Jose',
        // 	'email'=>'jospadrinom@gmail.com',
        // 	'password'=>bcrypt('laravel'),
        // 	'profession_id'=>$professions->id,
        // ]);


        User::create([
        	'name'=>'Jose',
        	'email'=>'padrinomsdsd',
        	'password'=>bcrypt('laravel'),
        	'profession_id'=>$professions->id
        ]);

        User::create([
            'name'=>'Yohanna',
            'email'=>'yohannapadrino93@gmail.com',
            'password'=>bcrypt('laravel'),
            'profession_id'=>$professions->id
        ]);

        //Otra forma mas facil de crear registros de prueba.. Model factories...
        //con profesion
        factory(User::class)->create(['profession_id'=>$professions->id]);

        factory(User::class,48)->create();//crea 48 usuarios sin profesion
    }
}
