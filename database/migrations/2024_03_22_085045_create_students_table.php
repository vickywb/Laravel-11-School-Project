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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nisn');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->dateTime('date_of_birth');
            $table->string('religion');
            $table->string('address');
            $table->string('phone_number');
            $table->string('origin_of_school');
            $table->string('address_of_school');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_job');
            $table->string('mother_job');
            $table->string('phone_number_parent');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
