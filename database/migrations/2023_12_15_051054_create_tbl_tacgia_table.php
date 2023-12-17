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
        Schema::create('tbl_tacgia', function (Blueprint $table) {
            $table->increments('tacgia_id');
            $table->string('tacgia_name');
            $table->string('tacgia_email');
            $table->string('tacgia_sex');
            $table->string('tacgia_status');
            $table->string('tacgia_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tacgia');
    }
};
