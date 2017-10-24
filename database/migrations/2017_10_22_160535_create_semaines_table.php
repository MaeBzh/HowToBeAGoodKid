<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semaines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_semaine');
            $table->integer('nb_vert');
            $table->integer('nb_rouge');
            $table->unsignedInteger('enfant_id');
            $table->foreign('enfant_id')->references('id')->on('enfants');
            $table->unsignedInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('users');
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
        Schema::dropIfExists('semaines');
    }
}
