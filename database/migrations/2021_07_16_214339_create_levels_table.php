<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('forex_order_fee', 12, 4)->default(0);
            $table->decimal('commodities_order_fee', 12, 4)->default(0);
            $table->decimal('indices_order_fee', 12, 4)->default(0);
            $table->decimal('stock_order_fee', 12, 4)->default(0);
            $table->decimal('crypto_order_fee', 12, 4)->default(0);
            $table->decimal('inactive_account_fee', 12, 2)->default(0);
            $table->decimal('custody_fee', 12, 2)->default(0);
            $table->decimal('withdrawal_under_1000_fee', 12, 2)->default(0);
            $table->decimal('withdrawal_above_1000_fee', 12, 2)->default(0);
            $table->decimal('managed_account_fee', 12, 2)->default(0);
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
        Schema::dropIfExists('levels');
    }
}
