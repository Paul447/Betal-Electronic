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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->string('password');
            $table->string('contact');
            $table->string('image');
            $table->string('role');
            $table->unsignedBigInteger('province');
            $table->foreign('province')->references('province_id')->on('provinces');
            $table->unsignedBigInteger('district');
            $table->foreign('district')->references('district_id')->on('districts');
            $table->unsignedBigInteger('municipality');
            $table->foreign('municipality')->references('municipalities_id')->on('municipalities');
            $table->string('ward');
            $table->string('user_status')->default('Active');
            $table->string('createdby')->default('system');
            $table->string('updatedby')->nullable();
            $table->string('otp')->nullable();
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
        Schema::dropIfExists('users');
    }
};
