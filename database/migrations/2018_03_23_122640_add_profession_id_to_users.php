<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessionIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){
            //$table->dropColumn('my_profession');
            $table->unsignedInteger('profession_id')->nullable();
            //restriccion de clave foranea. Si coloco la anterior linea asi: 
            /*
            $table->integer('profession_id')->unsigned();
            no me funciona la restriccion de clave foranea, pero cuando la quite, y deje la linea como está, ahora si me funciona.
            
            */
            $table->foreign('profession_id')->references('id')->on('professions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('profession_id');

        });
    }   
}
