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
        Schema::create('hero_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onUpdate('set null')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_pages');
    }
};
