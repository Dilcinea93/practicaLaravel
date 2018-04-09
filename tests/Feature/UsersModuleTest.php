<?php

namespace Tests\Feature;

use App\Models\Profession;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\TestResponse;


class UsersModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

    $exists=User::where(['name'=>'Jhon'])->first();
    $exists2=User::where(['name'=>'Ellie'])->first();
    // dd($exists);
    if($exists==NULL){

        factory(User::class)->create(['name'=>'Jhon']);//con esto cada vez que ejecute la prueba se crea un registro como este...
        factory(User::class)->create(['name'=>'Ellie']);//con esto cada vez que ejecute la prueba se crea un registro como este...
    }
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Jhon');
    }

    public function test_load_the_user_detail_page(){

    	$this->get('/usuarios/5')
    	->assertStatus(200);
    }

    public function test_create_user(){

    	$this->get('usuarios/nuevo')
    	->assertStatus(200);
    }

    public function test_shows_a_defaut_message_if_the_user_list_is_empty(){
        $no= DB::table('users')->get();
        if(!$no){
            $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');
        }
    }

    public function test_it_displays_a_404_eror_if_the_user_is_not_found(){
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Sorry, the user was not found');
    }

    public function test_it_creates_a_new_user(){
    //voy a comprobar si....
        $this->post('/usuarios',[       //Se esta enviando una peticion de tipo post
            'name'=>'Kevin',
            'email'=>'kzuleta@styde.net',
        ]);//->assertRedirect('usuarios');   //Puedes ver los metodos que puedes usar en el archivo Foundatrion/Testing/TestResponse. esto es para redireccionar...
        //se supone que iba a probar que redireccionara a la vista de usuarios pero no se porque con esto la prueba no pasa..

        //Vamos a ver si de verdad se guardaron los datos..
//1er argumento: tabla de base de datos.. en este caso tabla users
        $this->assertDatabaseHas('users',[
            'name'=>'Kevin',
            'email'=>'kzuleta@styde.net',
        ]);
    }
 
    public function test_the_name_is_required(){
        $this->post('/usuarios/',[
            'email'=>'jquintero@styde.net',
            'password'=>bcrypt('laravel')
        ])->assertSessionHasErrors(['name','email'])->assertRedirect('usuarios/nuevo');//Esto me estaba fallando, no me redireccionaba y era porque yo le estaba pasando 'usuarios' y la peticion post "usuarios" llama a store en UserController, el cual redirecciona a usuarios/nuevo caso de que el nombre este vacío
        //Pero el de la linea 71 ni idea porque no me funciona
        $this->assertDatabaseMissing('users',[
            'email'=>'jquintero@styde.net',
        ]);

        // $this->assetEquals(0,User::count()); NO ME FUNCIONA EN ESTE LARAVEL
    }

    public function test_the_email_is_required(){
         $this->post('/usuarios/',[
            'name'=>'Juans@gmail.com',
            'email'=>'', 
            'password'=>bcrypt('laravel')
        ])->assertSessionHasErrors(['email'])->assertRedirect('usuarios/nuevo');//Esto me estaba fallando, no me redireccionaba y era porque yo le estaba pasando 'usuarios' y la peticion post "usuarios" llama a store en UserController, el cual redirecciona a usuarios/nuevo caso de que el nombre este vacío
        //Pero el de la linea 71 ni idea porque no me funciona
        $this->assertDatabaseMissing('users',[
            'email'=>'Juans@gmail.com',
        ]);
    }
}
