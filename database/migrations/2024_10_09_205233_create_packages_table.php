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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->text('body')->nullable()->default(null);
            $table->text('quantity')->nullable()->default(null);
            $table->decimal('price', 10, 2)->nullable()->default(null);
            $table->enum('status',['ACTIVE','UNACTIVE'])->nullable()->default(null);
            $table->timestamps();
        });
    } 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
