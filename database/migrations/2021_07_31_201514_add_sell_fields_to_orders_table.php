<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->after('price', function ($table) {
                $table->decimal('sell_price', 12, 2)->nullable();
                $table->decimal('sell_symbol_price', 12, 2)->nullable();
                $table->decimal('sell_symbol_wallet_price', 12, 2)->nullable();
                $table->decimal('sell_fee', 12, 2)->nullable();
                $table->decimal('sell_order_total', 12, 2)->nullable();
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
            $table->dropColumn('sell_price');
            $table->dropColumn('sell_symbol_price');
            $table->dropColumn('sell_wallet_symbol_price');
            $table->dropColumn('sell_fee');
            $table->dropColumn('sell_order_total');
        });
    }
}
