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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('previous_owner_id')->nullable();
            $table->enum('vehicle_type', ['luxury','sedan','convertible','jdm','sports','hyper']);
            $table->string('vehicle_make', 50);
            $table->string('vehicle_model', 50);
            $table->integer('vehicle_year_manufactured');
            $table->integer('vehicle_year_registered');
            $table->enum('vehicle_ownership', ['new','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth']);
            $table->string('vehicle_color', 50);
            $table->integer('vehicle_mileage');
            $table->enum('vehicle_transmission', ['automatic','manual']);
            $table->enum('vehicle_fuel_type', ['petrol','diesel','electric','hybrid']);
            $table->enum('vehicle_condition', ['new','used']);
            $table->string('vehicle_license_plate', 50);
            $table->mediumText('vehicle_thumbnail', 255)->nullable();
            $table->mediumText('vehicle_images', 1000)->nullable();
            // $table->string('vehicle_thumbnail', 50);
            // $table->string('vehicle_images', 50);
            $table->string('vehicle_description', 150)->nullable();
            $table->decimal('vehicle_cost_price', 11, 2);
            $table->decimal('vehicle_selling_price', 11, 2);
            $table->decimal('profit', 11, 2);
            $table->enum('availability', ['available','sold']);

            $table->timestamps();

            $table->foreign('previous_owner_id')->references('id')->on('previous_owner_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_details');
    }
};
