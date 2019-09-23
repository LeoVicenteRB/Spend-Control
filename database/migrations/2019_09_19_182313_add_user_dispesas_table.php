<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserDispesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dispesas', function (Blueprint $table) {
            $table->integer('id_usuario')->after('preco');        
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::create('dispesas', function (Blueprint $table) {
            $table->dropColumn('id_usuario');
        });
    }
}