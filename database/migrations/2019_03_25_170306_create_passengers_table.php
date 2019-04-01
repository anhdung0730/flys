<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('passenger_flight_book_id')->unsigned();
            $table->integer('passenger_customer_id')->unsigned();
            $table->string('passenger_first_name')->nullable();
            $table->string('passenger_last_name')->nullable();
            $table->string('passenger_title')->nullable();
            $table->timestamps();
            $table->foreign('passenger_flight_book_id')->references('id')->on('flight_books')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
