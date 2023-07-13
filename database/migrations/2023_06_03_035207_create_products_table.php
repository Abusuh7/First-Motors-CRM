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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('product_price', 9, 2);
            $table->text('product_description');
            $table->mediumText('product_image', 3048)->nullable();
            // $table->string('product_more_image')->nullable();
            $table->string('product_category');
            $table->integer('product_stock');
            $table->enum('product_status', ['instock', 'lowstock', 'outofstock'])->default('instock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
