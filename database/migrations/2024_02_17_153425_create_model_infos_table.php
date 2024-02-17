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
        Schema::create('model_infos', function (Blueprint $table) {
            $table->id();
            $table->string('module_title');
            $table->string('module_type');
            $table->string('module_code');
            $table->integer('ects_credits');
            $table->string('module_level');
            $table->string('semester_of_delivery');
            $table->string('administering_department');
            $table->string('faculty');
            $table->string('module_leader');
            $table->string('ml_email');
            $table->string('module_leader_acad_title');
            $table->string('module_leader_qualification');
            $table->string('module_tutor');
            $table->string('mt_email');
            $table->string('peer_reviewer_name');
            $table->string('prn_email');
            $table->string('review_committee_approval');
            $table->string('version_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_infos');
    }
};
