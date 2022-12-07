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
        Schema::create('chitietdonhangs', function (Blueprint $table) {
            $table->id();
            $table->string('dongia');
            $table->unsignedBigInteger('donhang_id');
            $table->unsignedBigInteger('sanpham_id');
            $table->timestamps();
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onDelete('cascade');
            $table->foreign('sanpham_id')->references('id')->on('sanphams')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhangs');
    }
};
