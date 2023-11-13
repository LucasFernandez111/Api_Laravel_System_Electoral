<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relación con la tabla 'users'
            $table->string('partido');
            $table->boolean('voto')->default(1); // Nueva columna 'voto'

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votacion');
    }
}
