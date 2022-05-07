<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpreatToWalletSymbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallet_symbols', function (Blueprint $table) {
            $table->after('amount', function ($table) {
                $table->decimal('spread', 12, 2)->nullable();
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
        Schema::table('wallet_symbols', function (Blueprint $table) {
            $table->dropColumn('spread');
        });
    }
}