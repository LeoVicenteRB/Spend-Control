<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('contas', function (Blueprint $table) {
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
        Schema::table('contas', function(Blueprint $table)
        {
            $table->dropColumn('id_usuario');
        });
    }
}