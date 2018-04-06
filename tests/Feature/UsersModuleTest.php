<?php

namespace Tests\Feature;

use App\Models\Profession;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

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
        ->assertSee('Jhon')
        ->assertSee('Ellie');
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
}
