<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('customer_id');
            // $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('uniqid')->nullable();
            $table->string('name');
            $table->string('contact_number');
            $table->string('email'); 
            $table->string('booking_date');
            $table->string('flexibility');
            $table->string('vehicle_size');
            $table->tinyInteger('approval_status')->defalt(0); //1:confirm 0:pending
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
