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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('pet_id')->constrained('pets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('reason');
            $table->string('whom');
            $table->enum('children_present', ['Yes', 'No']);
            $table->enum('other_pets', ['Yes', 'No']);
            $table->enum('family_favor', ['Yes', 'No']);
            $table->enum('family_allergy', ['Yes', 'No']);
            $table->string('financer');
            $table->string('carer');
            $table->string('building_type');
            $table->string('residence_policies');
            $table->string('pet_place');
            $table->string('litterbox_place');
            $table->enum('prepared_odour', ['Yes', 'No']);
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Cancelled'])->default('Pending');
            $table->string('selfie')->nullable()->unique();
            $table->timestamp('appointment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
