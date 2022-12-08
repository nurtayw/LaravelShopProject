<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->string('country_kz')->nullable();
            $table->string('country_en')->nullable();
            $table->string('country_ru')->nullable();
            $table->string('country_ita')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manufacturers', function (Blueprint $table) {
            $table->dropColumn('country_kz');
            $table->dropColumn('country_en');
            $table->dropColumn('country_ru');
            $table->dropColumn('country_ita');
        });
    }
};
