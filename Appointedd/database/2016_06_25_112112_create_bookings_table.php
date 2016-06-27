<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create bookings table
        Schema::create('bookings', function(Blueprint $table){
            $table->increments('id');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('service');
            $table->integer('customer_id')->unsigned();
            $table->integer('staff_id')->unsigned();

            // foreign key refrences on staffs and customers table
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('staff_id')->references('id')->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
