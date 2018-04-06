<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class welcomeUsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_welcome_user_with_nick(){
    	$this->get('usuarios/yohanna/padrino')
    	->assertStatus(200);
    }
    public function test_welcome_user_without_nick(){
    	
    	$this->get('usuarios/yohanna')
    	->assertStatus(200);
    }
}
