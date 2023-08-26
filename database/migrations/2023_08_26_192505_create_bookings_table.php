<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('vehicle_id')->constrained('vehicle_details');
            //booking type is enum type
            $table->enum('booking_type', ['test_drive','purchase']);
            $table->date('booking_date');
            $table->time('booking_time');
            //booking status is enum type
            $table->enum('booking_status', ['pending','completed', 'rejected', 'approved']);
            $table->double('booking_amount');
            //booking mode is enum type
            $table->enum('booking_mode', ['online','offline']);
            $table->string('payment_reference_image')->nullable();
            $table->enum('booking_payment_status', ['paid','unpaid']);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vehicle_id')->references('id')->on('vehicle_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
