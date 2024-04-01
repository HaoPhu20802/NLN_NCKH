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
        Schema::create('tbl_detailtopic', function (Blueprint $table) {
            $table->unsignedInteger('topic_id');
            $table->string('student_id', 11);
            $table->string('teacher_id', 11);
            $table->text('detailtopic_abtract');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_detailtopic');
    }
};
