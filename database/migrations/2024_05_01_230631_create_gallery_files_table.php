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
        Schema::create('gallery_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->unsignedBigInteger('gallery_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreign('gallery_id')
            ->references('id')
            ->on('galleries')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_files');
    }
};
