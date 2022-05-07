<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('buy_symbol_price');
            $table->dropColumn('buy_order_price');
            $table->dropColumn('sell_symbol_price');
            $table->dropColumn('sell_order_price');
            $table->after('type', function ($table) {
                $table->enum('status', ['pending', 'open', 'close', 'waiting', 'cancelled', 'waiting_sell'])->default('close');
            });
            $table->after('amount', function ($table) {
                $table->decimal('price', 12, 2)->nullable();
                $table->decimal('limit_price', 12, 2)->nullable();
                $table->decimal('stop_price', 12, 2)->nullable();
                $table->decimal('fee', 12, 2)->nullable();
                $table->decimal('order_total', 12, 2)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('price');
            $table->dropColumn('limit_price');
            $table->dropColumn('stop_price');
            $table->dropColumn('fee');
            $table->dropColumn('order_total');
        });
    }
}
