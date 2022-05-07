<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletIdToBalanceTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balance_transactions', function (Blueprint $table) {
            $table->after('user_id', function ($table) {
                $table->integer('wallet_id')->unsigned()->index();
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
        Schema::table('balance_transactions', function (Blueprint $table) {
            $table->dropColumn('wallet_id');
        });
    }
}
