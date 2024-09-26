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
            $table->text('detail')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_open');
            $table->unsignedBigInteger('duration')->default(0);
            $table->unsignedBigInteger('seat_available')->default(0);
            $table->float('price_start_from')->default(0);
            $table->date('start_priode')->nullable();
            $table->date('end_priode')->nullable();
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
