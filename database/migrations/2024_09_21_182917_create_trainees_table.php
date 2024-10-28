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
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('institute_id')->constrained();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedBigInteger('disable_id')->nullable();
            $table->text('registration_no')->nullable();
            $table->text('father_name');
            $table->text('cnic')->nullable();
            $table->string('basic_qualification')->nullable();
            $table->string('basic_qualification_detail', 100)->nullable();
            $table->string('experience')->nullable();
            $table->unsignedBigInteger('prv_rec')->nullable();
            $table->unsignedBigInteger('uid')->nullable();
            $table->string('psdf_traineeId', 50)->nullable();
            $table->string('psdf_class_code', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainees');
    }
};
