<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_volumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->unsigned()->index();
            $table->enum('status', ['open', 'closed']);
            $table->decimal('required_volume', 12, 2)->default(0);
            $table->decimal('approved_volume', 12, 2)->default(0);
            $table->decimal('pending_volume', 12, 2)->default(0);
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
        Schema::dropIfExists('trading_volumes');
    }
}
