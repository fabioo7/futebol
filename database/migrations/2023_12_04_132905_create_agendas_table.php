<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
        $table->increments('agenda_id');
        $table->date('data_partida')->nullable();
        $table->integer('qtd')->nullable();
        $table->integer('partida')->nullable();
        $table->integer('time_1')->nullable();
        $table->integer('time_2')->nullable();
	$table->integer('placa')->nullable();
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
        Schema::dropIfExists('agenda');
    }
}
