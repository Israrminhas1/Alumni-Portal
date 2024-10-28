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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('resume_template_id')->constrained();
            $table->string('code', 36)->index(); // uuid
            $table->string('slug')->nullable(); //for publish landingpage
            $table->string('job_title')->nullable();
            $table->text('summary')->nullable();
            $table->text('skill')->nullable();
            $table->longText('content')->nullable();
            $table->longText('style')->nullable();
            $table->unsignedInteger('is_published')->default(1);
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};

