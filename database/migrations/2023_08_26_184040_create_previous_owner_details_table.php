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
        Schema::create('previous_owner_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('phone_number', 10);
            $table->string('email', 50)->nullable();
            $table->enum('gender', ['male','female','other']);
            $table->date('dob');
            $table->integer('age');
            $table->string('occupation', 50);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->integer('zip_code');
            $table->string('country', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_owner_details');
    }
};
