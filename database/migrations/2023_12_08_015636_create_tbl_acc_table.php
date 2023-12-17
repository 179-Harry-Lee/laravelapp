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
        Schema::create('tbl_acc', function (Blueprint $table) {
            $table->increments('acc_id');
            //neu de string trong se lay mac dinh la 255
            $table->string('acc_email',100);
            $table->string('acc_password');
            $table->string('acc_name');
            $table->string('acc_sex');
            $table->string('acc_phone');
            $table->string('acc_image');
            $table->string('acc_codecard');
            $table->date('acc_ngaydangky');
            $table->date('acc_ngayhethan');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_acc');
    }
};
