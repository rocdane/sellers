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
            $table->string('media')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('price')->default(0);
            $table->integer('view')->default(0);
            $table->boolean('sold')->default(false);
            $table->timestamp('sold_at')->nullable();
            $table
                ->foreignIdFor(\App\Models\Category::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
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
