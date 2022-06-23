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
        Schema::create('bid_info', function (Blueprint $table) {
            $table->id('bid');
            $table->timestamps();
            $table->integer('startingAmount');
            $table->integer('timePeriod');
            $table->dateTime('submitTime');
            $table->unsignedBigInteger('fid');
            $table->unsignedBigInteger('pid');
            $table->foreign('fid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pid')->references('pid')->on('product')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_info');
    }
};
