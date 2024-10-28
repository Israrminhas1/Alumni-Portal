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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('institute_type_id')->nullable();
            $table->unsignedInteger('inst_medium_id')->nullable();
            $table->unsignedInteger('qab_id')->nullable();
            $table->unsignedInteger('organization_id')->nullable();
            $table->unsignedInteger('shift_id')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('town_id')->nullable();
            $table->unsignedInteger('location_id')->default(1);
            $table->unsignedInteger('owner_id')->nullable();
            $table->string('institute_name', 255)->nullable();
            $table->string('institute_code', 255)->nullable();
            $table->unsignedInteger('gender_id')->nullable();
            $table->string('principal_name', 255)->nullable();
            $table->string('principal_phone', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('postal_address', 255)->nullable();
            $table->unsignedInteger('provincial_no')->nullable();
            $table->unsignedInteger('ucno')->nullable();
            $table->unsignedInteger('condition')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('qualifications', 255)->nullable();
            $table->unsignedInteger('assessment_center')->default(0);
            $table->unsignedInteger('nano')->nullable();
            $table->unsignedInteger('classrooms')->nullable();
            $table->unsignedInteger('electricity')->nullable();
            $table->unsignedInteger('backup_source')->nullable();
            $table->unsignedInteger('backup_source_type')->nullable();
            $table->unsignedInteger('hostel')->nullable();
            $table->unsignedInteger('hostel_for')->nullable();
            $table->unsignedInteger('hostel_rooms')->nullable();
            $table->unsignedInteger('transport')->nullable();
            $table->unsignedInteger('transport_for')->nullable();
            $table->unsignedInteger('vehicles')->nullable();
            $table->unsignedInteger('furniture_for_students')->nullable();
            $table->unsignedInteger('computers')->nullable();
            $table->unsignedInteger('num_of_computers')->nullable();
            $table->unsignedInteger('computer_for')->nullable();
            $table->unsignedInteger('internet')->nullable();
            $table->unsignedInteger('internet_for')->nullable();
            $table->unsignedInteger('library')->nullable();
            $table->unsignedInteger('workshop')->nullable();
            $table->unsignedInteger('workshop_status')->nullable();
            $table->unsignedInteger('workshop_equipments')->nullable();
            $table->unsignedInteger('equipments_status')->nullable();
            $table->unsignedInteger('co_curriculum_activities')->nullable();
            $table->unsignedInteger('industrial_visits')->nullable();
            $table->unsignedInteger('sports')->nullable();
            $table->unsignedInteger('drinking_water')->nullable();
            $table->unsignedInteger('canteen')->nullable();
            $table->unsignedInteger('canteen_status')->nullable();
            $table->unsignedInteger('toilets')->nullable();
            $table->unsignedInteger('first_aid')->nullable();
            $table->unsignedInteger('sanc_teachers')->default(0);
            $table->unsignedInteger('sanc_teachers_m')->default(0);
            $table->unsignedInteger('sanc_teachers_f')->default(0);
            $table->unsignedInteger('filled_teacher_m')->default(0);
            $table->unsignedInteger('filled_teacher_f')->default(0);
            $table->unsignedInteger('sanc_non_teachers')->default(0);
            $table->unsignedInteger('sanc_non_teachers_m')->default(0);
            $table->unsignedInteger('sanc_non_teachers_f')->default(0);
            $table->unsignedInteger('filled_non_teachers_m')->default(0);
            $table->unsignedInteger('filled_non_teachers_f')->default(0);
            $table->unsignedInteger('bcondition')->nullable();
            $table->unsignedInteger('uid')->nullable();
            $table->unsignedInteger('vcjp')->nullable();
            $table->unsignedInteger('nsis')->nullable();
            $table->unsignedInteger('cbt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
