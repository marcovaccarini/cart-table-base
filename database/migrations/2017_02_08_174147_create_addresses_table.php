<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_type_address');
            $table->integer('user_id')->nullable();
            $table->integer('order_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('state');
            $table->integer('zip_code');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
