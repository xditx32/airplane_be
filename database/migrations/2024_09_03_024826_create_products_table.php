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
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->string('photo')->nullable();
            $table->string('brochure')->nullable();
            $table->boolean('is_open');
            $table->boolean('is_promo');
            $table->string('display')->nullable();
            $table->unsignedBigInteger('duration')->default(0);
            $table->unsignedBigInteger('seat_available')->default(0);
            $table->float('price_start_from')->default(0);
            $table->date('start_priode')->nullable();
            $table->date('end_priode')->nullable();
            $table->string('is_currency')->nullable();
            $table->string('category_prog')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->softDeletes();
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
