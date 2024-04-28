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
        Schema::create('field_of_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_id');
            $table->string('title');
            $table->softDeletes();
            $table->timestamps();

            
            $table->foreign('major_id')
                ->references('id')
                ->on('majors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_of_works');
    }
};
