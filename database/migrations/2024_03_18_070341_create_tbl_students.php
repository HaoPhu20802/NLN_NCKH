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
        Schema::create('tbl_students', function (Blueprint $table) {
            $table->string('student_id', 17)->primary();
            $table->unsignedInteger('nganh_id');
            $table->unsignedInteger('user_id');
            $table->string('student_name', 50);
            $table->date('student_ngaysinh');
            $table->string('student_gioitinh');
            $table->string('student_khoahoc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_students');
    }
};
