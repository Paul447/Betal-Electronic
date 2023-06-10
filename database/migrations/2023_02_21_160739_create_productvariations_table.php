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
        Schema::create('productvariations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('product_id')->on('products');
            $table->unsignedBigInteger('variation_id');
            $table->foreign('variation_id')->references('variation_id')->on('variations');
            $table->unsignedBigInteger('variationoption_id');
            $table->foreign('variationoption_id')->references('variationoption_id')->on('variationoptions');
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
        Schema::dropIfExists('productvariations');
    }
};
