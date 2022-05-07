<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSymbols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('symbols', function (Blueprint $table) {
            $table->after('last_value', function ($table) {
                $table->double('change_percent')->nullable();
                $table->bigInteger('market_volume')->nullable();
                $table->bigInteger('average_10_day_volume')->nullable();
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
        Schema::table('symbols', function (Blueprint $table) {
            $table->dropColumn('change_percent');
            $table->dropColumn('market_volume');
            $table->dropColumn('average_10_day_volume');
        });
    }
}
