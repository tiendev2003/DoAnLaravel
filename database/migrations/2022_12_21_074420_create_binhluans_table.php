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
        Schema::create('binhluans', function (Blueprint $table) {
            $table->id();
            $table->string('noidung');
            $table->bigInteger('like')->default(0);
            $table->date('day_now');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sanpham_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('binhluans');
    }
};
