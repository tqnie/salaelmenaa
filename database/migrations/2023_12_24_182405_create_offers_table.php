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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->text('body')->nullable()->default(null);
            $table->integer('views')->nullable()->default(0); 
            $table->text('image')->nullable()->default(null);
            $table->text('video')->nullable()->default(null);
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('to_user_id'); 
            $table->unsignedBigInteger('product_id')->nullable()->default(null);     
            $table->enum('type', ['seller', 'buyer'])->nullable()->default(null);
            $table->enum('status', ['pending', 'approved', 'rejected'])->nullable()->default('pending');
            $table->timestamps();
        });
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
