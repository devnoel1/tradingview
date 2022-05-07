<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarginToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->after('amount', function ($table) {
                $table->decimal('symbol_price', 12, 2)->default(0);
            });
            $table->after('order_total', function ($table) {
                $table->decimal('initial_margin', 12, 2)->nullable();
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
            $table->dropColumn('symbol_price');
            $table->dropColumn('initial_margin');
        });
    }
}
