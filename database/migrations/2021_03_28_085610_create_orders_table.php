<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->bigIncrements('Order_id');
            $table->string('Order_user_id');
            
            $table->string('Order_product_quantity');
            $table->string('Order_total_cost');
            $table->string('Order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
/*
user id
user name address
stauts 0=>  order 1=> accepte 2=> reject
quantity
prize
total
product id
product stauts
*/
