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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('breed_id')->constrained('breeds');
            $table->string('name');
            $table->integer('age');
            $table->string('color');
            $table->string('size');
            $table->longText('description');
            $table->string('images_folder')->unique();
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('activity_level', ['High', 'Moderate', 'Low']);
            $table->enum('status', ['Adopted', 'New', 'Unavailable'])->default('New');
            $table->enum('type', ['Dog', 'Cat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
