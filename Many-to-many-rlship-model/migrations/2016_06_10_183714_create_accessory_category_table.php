<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoryCategoryTable extends Migration
{
    /**
     * Join table of accessory and category 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory_category', function(Blueprint $table){
            $table->increments('id');
           // $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->integer('accessory_id')->unsigned();


            $table->foreign('accessory_id')->references('id')->on('accessories');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        //Schema::table('accessory_category', function($table){
         //   $table->string('name')->after('id');
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accessory_category');
    }
}
