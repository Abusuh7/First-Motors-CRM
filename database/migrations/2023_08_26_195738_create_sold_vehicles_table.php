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
        Schema::create('sold_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->constrained('bookings');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicle_details');
            $table->string('buyer_fname');
            $table->string('buyer_lname');
            $table->string('buyer_email');
            $table->string('buyer_phone');
            $table->string('buyer_gender');
            $table->date('sold_date');
            $table->double('sold_amount');
            $table->enum('sold_status', ['pending_delivery','completed']);
            $table->date('delivery_date')->nullable();
            $table->foreignId('staff_id')->nullable()->constrained('staff');
            $table->double('staff_commission');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('vehicle_id')->references('id')->on('vehicle_details');
            $table->foreign('staff_id')->references('id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_vehicles');
    }
};
