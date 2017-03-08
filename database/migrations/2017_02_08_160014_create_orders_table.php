<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('cart_id')->unsigned();
            $table->string('email')->unsigned();
            $table->boolean('has_billing_address');
            $table->decimal('subtotal', 10, 2)->unsigned();
            $table->decimal('shipping_cost', 10, 2)->unsigned();
            $table->decimal('total', 10, 2)->unsigned();
            $table->string('note');
            $table->string('transaction_id');
            $table->timestamps();
            $table->softDeletes();

            Schema::enableForeignKeyConstraints();
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
