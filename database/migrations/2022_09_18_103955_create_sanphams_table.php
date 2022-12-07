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
        Schema::create('sanphams', function (Blueprint $table) {
            $table->id();
            $table->string('cpu');
            $table->bigInteger('dongia');
            $table->bigInteger('donviban');
            $table->bigInteger('donvikho');
            $table->string('dungluongpin');
            $table->string('hedieuhanh');
            $table->string('manhinh');
            $table->string('ram');
            $table->string('name');
            $table->string('thietke');
            $table->string('thongtinbaohanh');
            $table->string('thongtinchung');
            $table->string('anh');
            $table->unsignedBigInteger('danhmuc_id');
            $table->unsignedBigInteger('nhanhieu_id');
            $table->timestamps();
            $table->foreign('danhmuc_id')->references('id')->on('danhmucs')->onDelete('cascade');
            $table->foreign('nhanhieu_id')->references('id')->on('nhanhieus')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphams');
    }
};
