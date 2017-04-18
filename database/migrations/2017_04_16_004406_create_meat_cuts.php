<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeatCuts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('meat_cuts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kind');
            $table->string('cut_type');
            $table->string('hscode');
            $table->string('name_number');
            $table->string('remarks');
            $table->string('country');
            $table->string('image');
            $table->string('show');
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
        Schema::dropIfExists('meat_cuts');
    }
}

