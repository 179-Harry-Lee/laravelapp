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
        Schema::create('tbl_book', function (Blueprint $table) {
            $table->increments('book_id');
            $table->integer('category_id');
            $table->integer('nxb_id');
            $table->integer('tacgia_id');
            $table->text('book_name');
            $table->text('book_desc');
            $table->string('book_price');
            $table->string('book_image');
            $table->integer('book_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
