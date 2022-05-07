<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symbols', function (Blueprint $table) {
            $table->id();
            $table->integer('exchange_id')->unsigned()->index();
            $table->string('name');
            $table->string('description');
            $table->string('code');
            $table->string('currency');
            $table->enum('type', ['stock', 'crypto', 'forex', 'indices', 'commodities']);
            $table->double('last_value');
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
        Schema::dropIfExists('symbols');
    }
}
