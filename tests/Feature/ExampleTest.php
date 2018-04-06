<?php
//este archivo es para escribir pruebas que simular peticiones http al servidor (?)
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {//esta prueba simula una peticion http a la ruta "home" y luego comprueba que se envia un 200 al llamar a la funcion assertStatus.. osea, que salio bien la prueba ps... 
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
