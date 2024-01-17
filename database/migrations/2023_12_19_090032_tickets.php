<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('barcode');
            $table->string('bus_id');
            $table->integer('trip_id');
            $table->integer('customer_id');
            $table->integer('company_id');
            $table->integer('location_id');
            $table->integer('destination_id');
            $table->date('date');
            $table->date('estimated_time');
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
