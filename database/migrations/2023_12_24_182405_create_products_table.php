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
            $table->string('title')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->text('body')->nullable()->default(null); 
            $table->integer('views')->nullable()->default(0);  
            $table->text('image')->nullable()->default(null); 
            $table->enum('status', ['active','unactive'])->nullable()->default(null);
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
