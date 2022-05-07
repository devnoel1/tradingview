<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarginToLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->after('crypto_order_fee', function ($table) {
                $table->decimal('inital_margin_perc', 12, 2)->default(0.2);
                $table->decimal('maintenance_margin_perc', 12, 2)->default(0.25);
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
        Schema::table('levels', function (Blueprint $table) {
            $table->dropColumn('inital_margin_perc');
            $table->dropColumn('maintenance_margin_perc');
        });
    }
}
