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
        Schema::create('tbl_teachers', function (Blueprint $table) {
            $table->string('teacher_id', 7)->primary();
            $table->unsignedInteger('khoa_id');
            $table->unsignedInteger('user_id');
            $table->string('teacher_name', 50);
            $table->date('teacher_ngaysinh');
            $table->string('teacher_gioitinh');
            $table->string('teacher_ngachvienchuc', 50);
            $table->string('teacher_trinhdo', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_teachers');
    }
};
