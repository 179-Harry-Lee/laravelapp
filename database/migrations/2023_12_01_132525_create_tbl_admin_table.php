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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->increments('admin_id');
            //neu de string trong se lay mac dinh la 255
            $table->string('admin_email',100);
            $table->string('admin_password');
            $table->string('admin_name');
            $table->string('admin_phone');
            //Tu dong them thoi gian taoj table nay
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
    }
};
