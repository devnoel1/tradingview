<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->after('id_back_path', function ($table) {
                $table->string('proof_of_address_path', 2048)->nullable();
                $table->string('credit_path', 2048)->nullable();
                $table->string('insurance_path', 2048)->nullable();
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
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('proof_of_address_path');
            $table->dropColumn('credit_path');
            $table->dropColumn('insurance_path');
        });
    }
}
