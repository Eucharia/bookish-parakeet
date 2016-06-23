<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * accessories table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id');
            $table->timestamps('added_on');

            //$table->primary('id');
        });

         //Schema::table('accessories', function($table){
            //    $table->integer('category_id')->after('name');
            //    $table->dropColumn('amount');
            //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accessories');
    }
}
