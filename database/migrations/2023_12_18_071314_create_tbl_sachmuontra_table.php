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
        Schema::create('tbl_sachmuontra', function (Blueprint $table) {
            $table->increments('sachmtr_id');
            $table->integer('category_id');
            $table->integer('nxb_id');
            $table->integer('tacgia_id');
            $table->integer('book_id');
            $table->integer('acc_id');
            $table->string('sachmtr_codemuon');
            $table->string('sachmtr_desc');
            $table->date('sachmtr_ngaymuon');
            $table->date('sachmtr_ngaytra');
            $table->string('sachmtr_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sachmuontra');
    }
};
