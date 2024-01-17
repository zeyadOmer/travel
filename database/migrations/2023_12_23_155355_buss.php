<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Buss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('buss',function(Blueprint $table){

            $table->integer('id');
            $table->string("address")->nullable();
            $table->integer('plate')->unique();
            $table->integer('company_id');
            $table->integer('capacity');
            $table->integer('driver_id');
            $table->string('Manufacture');
            $table->string('color');

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
        //
    }
}
