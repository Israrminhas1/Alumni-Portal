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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('code');
            $table->string('symbol', 100);
            $table->string('currency', 50);
            $table->string('capital', 100)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('continent', 50)->nullable();
            $table->string('continent_code', 50)->nullable();
            $table->string('alpha_3', 10)->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
