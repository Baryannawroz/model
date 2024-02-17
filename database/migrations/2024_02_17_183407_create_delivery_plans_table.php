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
        Schema::create('delivery_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modelinfo_id');
            $table->unsignedBigInteger("material_covered_id");

            $table->timestamps();
            $table->foreign('material_covered_id')->references('id')->on('subjectcontents')->onDelete('cascade');
            $table->foreign('modelinfo_id')->references('id')->on('model_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_plans');
    }
};
