<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
        $table->increments('jogadores_id');
        $table->string('name' ,80)->nullable();
        $table->integer('time_id')->nullable();
        $table->string('tipo' ,12)->nullable();
        $table->integer('nivel')->nullable();
        $table->integer('check_confirmacao')->nullable();
        $table->string('description' ,80)->nullable();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogadores');
    }
}


