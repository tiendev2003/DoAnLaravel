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
        Schema::create('lienhes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ngaylienhe');
            $table->string('ngaytraloi');
            $table->string('noidunglienhe');
            $table->string('noidungtraloi');
            $table->string('trangthai');
            $table->unsignedBigInteger('nguoitraloi_id');
            $table->timestamps();
            $table->foreign('nguoitraloi_id')->references('id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhes');
    }
};
