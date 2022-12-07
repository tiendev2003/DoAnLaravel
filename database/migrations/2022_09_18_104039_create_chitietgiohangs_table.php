<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietgiohangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soluong');
            $table->unsignedBigInteger('sanpham_id');
            $table->unsignedBigInteger('giohang_id');
            $table->timestamps();
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onDelete('cascade');
            $table->foreign('giohang_id')->references('id')->on('giohangs')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietgiohangs');
    }
};
