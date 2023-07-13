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
        Schema::create('add_product_batches', function (Blueprint $table) {
            $table->id('productbatchid');
            $table->unsignedBigInteger('batchid');
            $table->foreign('batchid')->references('batch_id')->on('_batch__migration');
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('product_id')->on('products');
            $table->integer('costprice');
            $table->integer('sellingprice');
            $table->integer('availablequantity');
            $table->integer('soldquantity');
            $table->integer('profit');
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
        Schema::dropIfExists('add_product_batches');
    }
};
