<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->bigIncrements('Ordered_product_id');
            $table->string('Ordered_product_order_id');
            $table->string('Ordered_product_product_id');
            $table->string('Ordered_product_quantity');
            $table->string('Ordered_product_cost');
            $table->string('Ordered_product_total_cost');
            $table->string('Ordered_product_order_status')->default(0);
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
        Schema::dropIfExists('ordered_products');
    }
}
