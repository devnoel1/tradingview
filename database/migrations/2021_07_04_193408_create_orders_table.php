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
            $table->id();
            $table->foreignId('wallet_id')->unsigned()->index();
            $table->foreignId('symbol_id')->unsigned()->index();
            $table->enum('type', ['buy', 'sell']);
            $table->double('amount');
            $table->decimal('buy_symbol_price', 12, 2)->nullable();
            $table->decimal('buy_order_price', 12, 2)->nullable();
            $table->decimal('sell_symbol_price', 12, 2)->nullable();
            $table->decimal('sell_order_price', 12, 2)->nullable();
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
