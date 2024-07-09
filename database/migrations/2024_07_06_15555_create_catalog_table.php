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
        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->decimal('entity_id', 20, 6)->default('0.000000')->nullable();
            $table->string('CategoryName')->nullable();
            $table->mediumText('sku')->nullable();
            $table->string('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('shortdesc')->nullable();
            $table->double('price')->default(0)->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->string('Brand')->nullable();
            $table->tinyInteger('Rating')->nullable();
            $table->string('CaffeineType')->nullable();
            $table->string('Count')->nullable();
            $table->string('Flavored')->nullable();
            $table->string('Seasonal')->nullable();
            $table->string('Instock', 50)->nullable();
            $table->mediumText('Facebook')->nullable();
            $table->string('IsKCup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog');
    }
};
