<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('trips', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->integer('location_id');
            $table->integer('destination_id');
            $table->integer('bus_id');
            $table->integer('customer_id');
            $table->integer('copmany_id');
            $table->integer('service_id');
            $table->date('start_date');
            $table->date('estimated_date');
            $table->timestamps(); // Created at and updated at timestamps
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
