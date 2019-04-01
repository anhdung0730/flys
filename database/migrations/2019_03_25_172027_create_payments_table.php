<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_flight_book_id')->unsigned();
            $table->string('payment_method')->nullable();
            $table->string('payment_card_number')->nullable();
            $table->string('payment_name_on_card')->nullable();
            $table->string('payment_ccv_code')->nullable();
            $table->timestamps();
            $table->foreign('payment_flight_book_id')->references('id')->on('flight_books')
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
        Schema::dropIfExists('payments');
    }
}
