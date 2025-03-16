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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->after('password')->nullable();
            $table->string('role_id')->after('avatar')->nullable();
            $table->string('country')->after('role_id')->nullable();
            $table->string('city')->after('country')->nullable();
            $table->string('address')->after('city')->nullable();
            $table->string('mobile')->after('address')->nullable();
            $table->string('ip')->after('address')->nullable();
            $table->string('profession')->after('mobile')->nullable();
            $table->string('profits')->after('profession')->nullable();
            $table->text('bio')->after('profession')->nullable();
            $table->date('subscription_at')->after('bio')->nullable(); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
