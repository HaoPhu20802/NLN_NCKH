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
        Schema::create('tbl_topic', function (Blueprint $table) {
            $table->increments('topic_id');
            $table->unsignedInteger('user_id');
            $table->string('topic_name', 255);   
            $table->date('topic_date');
            $table->text('topic_abtract');
            $table->string('topic_linhvuc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_topic');
    }
};
