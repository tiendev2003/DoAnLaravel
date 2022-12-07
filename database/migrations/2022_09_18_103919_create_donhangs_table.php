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
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('sdt');
            $table->string('name');
            $table->string('ngaydat');
            $table->string('ngaygiao');
            $table->string('ngaynhan');
            $table->string('trangthai');
            $table->string('ghichu');
            $table->unsignedBigInteger('nguoidat_id');
            $table->unsignedBigInteger('shipper_id');
            $table->timestamps();
            $table->foreign('nguoidat_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipper_id')->references('id')->on('users')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhangs');
    }
};
