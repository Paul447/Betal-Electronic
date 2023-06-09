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
        Schema::create('variationoptions', function (Blueprint $table) {
            $table->id('variationoption_id');
            $table->unsignedBigInteger('variation');
            $table->foreign('variation')->references('variation_id')->on('variations');
            $table->string('value');
            $table->unsignedBigInteger('addedby');
            $table->foreign('addedby')->references('id')->on('users');
            $table->unsignedBigInteger('approvedby')->nullable();
            $table->foreign('approvedby')->references('id')->on('users');
            $table->unsignedBigInteger('updatedby')->nullable();
            $table->foreign('updatedby')->references('id')->on('users');
            $table->unsignedBigInteger('updateapprovedby')->nullable();
            $table->foreign('updateapprovedby')->references('id')->on('users');
            $table->string('status')->default('pending');
            $table->string('updatestatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variationoptions');
    }
};
