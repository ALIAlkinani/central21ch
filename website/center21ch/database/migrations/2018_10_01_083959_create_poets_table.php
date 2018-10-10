<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->unique();
            $table->string('last_name')->unique();
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->date('date_of_death')->nullable();
            $table->string('mother_language');           
            $table->string('avatar_path')->nullable();
            $table->text('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poets');
    }
}
