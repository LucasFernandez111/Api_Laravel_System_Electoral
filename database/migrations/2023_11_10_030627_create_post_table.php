<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{

    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->string('partido');


        });
    }


    public function down()
    {
        Schema::dropIfExists('post');
    }
}
