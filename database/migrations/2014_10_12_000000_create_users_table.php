<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');//integer unsigned - autoincrement
            $table->string('name');//varchar
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->string('website')->nullable();
            $table->rememberToken();//
            $table->timestamps();//metodo helper para declarara created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');//borra la tabgla si existe
    }
}
