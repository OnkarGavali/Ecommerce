<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('Product_id');
            $table->string('Product_name');
            $table->string('Product_subcategory_id');
            $table->string('Product_description',500);
            $table->string('Product_image_url1');
            $table->string('Product_image_url2');
            $table->string('Product_image_url3');
            $table->string('Product_image_url4');
            $table->string('Product_image_url5');
            $table->string('Product_prize');
            $table->string('Product_color');
            $table->string('Product_size');
            $table->string('Product_status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
